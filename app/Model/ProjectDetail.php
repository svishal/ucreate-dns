<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    protected $table = 'project_details';
    protected $fillable = [
        'project_id', 'domain_registrar', 'registrant', 'contact', 'name_servers', 'website_title', 'website_description', 'language', 'server_type', 'hosted_on', 'dnssec', 'contact_email', 
            'created_date', 'expires_date', 'address', 'alexa_rank', 'ssl', 'ssl_expiry','ssl_type','ssl_crt_file','ssl_server_key_file','ssl_csr_file','delegate_access'
    ];
    
    static function project() {
     return $this->belongsTo('App/Model/Project');   
    }
    public static function projectsHavingSsl(){
       return self::where("ssl",1)->count();
    }
    public static function projectsHavingDelegateAccess(){
       return self::where("delegate_access_account", '!=', '')->count();
    }
    public static function projectExpiresIn($date){
        $today= date('Y-m-d H:i:s');
      
       return $date;
    }
}
