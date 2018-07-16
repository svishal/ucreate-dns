<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Model\Project;

class GetNameServerRecords implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $project_id;
    public $tries = 2;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($project_id)
    {
        $this->project_id = $project_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $project_id = $this->project_id;
        $new_array = [];
        $name_server_records = [];
        $name_server_record_count = 0;
        $project = Project::fetchProject(['id' => $project_id], ['nameServerRecord']);
        if(isset($project[0]->url)){
            $domain = get_domain($project[0]->url);
            $record_type_array = ['A', 'MX', 'NS', 'TXT', 'SOA'];
            $additional_domain_details = [];
            if ($domain) {
                foreach ($record_type_array as $record_type) {
                    $additional_domain_details[$record_type] = $this->getRecordValue($record_type, $this->getDomainDetailsApi($record_type, $domain));
                }

                if(count($additional_domain_details)){
                    foreach ($additional_domain_details as $key => $domain_detail){
                        $new_array[strtolower($key)] = implode(', ', $domain_detail);
                    }
                    
                    foreach ($new_array as $key => $value){
                        if(isset($project[0]->nameServerRecord->id)){
                            if(!empty(trim($value))){
                                $project[0]->nameServerRecord->$key = $value;
                                $name_server_record_count++;
                            }
                        }else{
                            $name_server_records['project_id'] = $project[0]->id;
                            if(!empty(trim($value))) $name_server_records[$key] = $value;
                            $name_server_record_count++;
                        }
                    }

                    if($name_server_record_count){
                        if(count($name_server_records)){
                            $name_server_record = new \App\Model\NameServerRecord($name_server_records);
                            $name_server_record->save();
                        }else{
                            $project[0]->nameServerRecord->save();
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
            CURLOPT_TIMEOUT=>500
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
    
    public function getRecordValue($record_type, $record) {
        $result= array();
        $record = json_decode($record, TRUE);
        if (!empty($record)) {
            foreach ($record as $key => $value) {
               if(!empty($value) && isset($value['value'])){ $result[] = $value['value'];}
            }
        }
        return $result;
    }
}
