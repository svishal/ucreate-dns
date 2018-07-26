<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Model\{
    Project,
    ProjectDetail
};
use PHPMailer\PHPMailer\PHPMailer;

class Kernel extends ConsoleKernel {

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
            //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
        $schedule->call(function () {
            try {
                $this->updateNameServerDetails();
            } catch (\Exception $e) {
                $message = 'error in cron' . $e;
                return $message;
            }
        })->hourly();
        $schedule->call(function () {
            try {
                $this->sendExpiryNotification();
            } catch (\Exception $e) {
                $message = 'error in cron' . $e;
                return $message;
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands() {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    public function updateNameServerDetails() {
        $new_array = [];
        $name_server_records = [];
        $name_server_record_count = 0;
        $projects = Project::get();
        if (count($projects)) {
            foreach ($projects as $project) {
                if (isset($project->url)) {
                    $domain = get_domain($project->url);
                    $record_type_array = ['A', 'MX', 'NS', 'TXT', 'SOA'];
                    $additional_domain_details = [];
                    if ($domain) {
                        foreach ($record_type_array as $record_type) {
                            $additional_domain_details[$record_type] = $this->getRecordValue($record_type, $this->getDomainDetailsApi($record_type, $domain));
                        }

                        if (count($additional_domain_details)) {
                            foreach ($additional_domain_details as $key => $domain_detail) {
                                $new_array[strtolower($key)] = implode(', ', $domain_detail);
                            }

                            foreach ($new_array as $key => $value) {
                                if (isset($project->nameServerRecord->id)) {
                                    if (!empty(trim($value))) {
                                        $project->nameServerRecord->$key = $value;
                                        $name_server_record_count++;
                                    }
                                } else {
                                    $name_server_records['project_id'] = $project->id;
                                    if (!empty(trim($value)))
                                        $name_server_records[$key] = $value;
                                    $name_server_record_count++;
                                }
                            }

                            if ($name_server_record_count) {
                                if (count($name_server_records)) {
                                    $name_server_record = new \App\Model\NameServerRecord($name_server_records);
                                    try {
                                        $name_server_record->save();
                                    } catch (Exception $ex) {
                                        return $ex->getMessage();
                                    }
                                } else {
                                    try {
                                        $project->nameServerRecord->save();
                                    } catch (Exception $ex) {
                                        return $ex->getMessage();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function getDomainDetailsApi($record, $domain) {
        $dns_api = getenv('GET_DNS_API');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "$dns_api/$record/$domain/",
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_TIMEOUT => 500
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function getRecordValue($record_type, $record) {
        $result = array();
        $record = json_decode($record, TRUE);
        if (!empty($record)) {
            foreach ($record as $key => $value) {
                if (!empty($value) && isset($value['value'])) {
                    $result[] = $value['value'];
                }
            }
        }
        return $result;
    }

    public function sendExpiryNotification() {
        $projects = ProjectDetail::fetchExpiringAccounts(date('Y-m-d', strtotime('+1 week')));
        if (count($projects)) {
            foreach ($projects as $project) {
                $text = "Dear Admin,<br><br>One of the account is expiring soon. Please find the details below of the same:<br><br>"
                        . "Project Name: " . ucfirst($project->project->name) . "<br>"
                        . "Project Url: " . $project->project->url . "<br>"
                        . "Domain Name Expiry Date: " . date('d-m-Y', strtotime($project->expires_date)) . "<br>"
                        . "SSL Expiry Date: " . date('d-m-Y', strtotime($project->ssl_expiry)) . "<br><br>"
                        . "Thanks and regards,<br>"
                        . "Ucreate-DNS";
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->CharSet = "utf-8";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = getenv('MAIL_ENCRYPTION');
                $mail->Host = getenv('MAIL_HOST');
                $mail->Port = 587;
                $mail->Username = getenv('MAIL_USERNAME');
                $mail->Password = getenv('MAIL_PASSWORD');
                $mail->setFrom('noreply@ucreate.co.in', "Ucreate-DNS");
                $mail->Subject = 'Account expiring soon';
                $mail->MsgHTML($text);
                $mail->addAddress('noreply@ucreate.co.in');
                $mail->addAddress('vikramjeet@ucreate.co.in');
                $mail->send();
            }
        }
    }

}
