<?php

namespace App\Model;
use App\Model\ProjectDetail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $table = 'projects';
    protected $fillable = [
        'short_name', 'name', 'url'
    ];
    
    public function projectDetail(){
        return $this->hasOne('App\Model\ProjectDetail');
    }
    public function nameServerRecord(){
        return $this->hasOne('App\Model\NameServerRecord');
    }
    public static function allProjects(){
       return self::orderBy('id')->get();
    }
    public static function searchProject($key, $date='', $filter_by_field = false){
        if(!empty($key)){
            $query = self::where([['projects.short_name', 'iLIKE', '%' .strtolower($key) . '%']])
               ->orWhere([['projects.name', 'iLIKE', '%' .strtolower($key) . '%']])
               ->orWhere([['project_details.language', 'iLIKE', '%' .strtolower($key) . '%']])
               ->orWhere([['project_details.domain_registrar', 'iLIKE', '%' .strtolower($key) . '%']])
               ->leftJoin('project_details', 'project_details.project_id', '=', 'projects.id');
            
        }
        if($filter_by_field){
            if($filter_by_field=='having_ssl'){
                $query = self::whereNotNull('ssl')->where('ssl', TRUE)
                    ->join('project_details', 'project_details.project_id', '=', 'projects.id');
            }elseif($filter_by_field=='having_delegate_access'){
                $query = self::whereNotNull('delegate_access_account')
                    ->join('project_details', 'project_details.project_id', '=', 'projects.id');
            }else{
                $query = self::whereDate($filter_by_field,'<=',$date)
                    ->whereDate($filter_by_field,'>=',date('Y-m-d'))
                    ->join('project_details', 'project_details.project_id', '=', 'projects.id');
            }
        }
        if(isset($query)){
          return $query->get();  
        }
    }
    
    public static function fetchProject($condition, $related_models=[]){
        $result = [];
        $query = self::where($condition);
        if(count($related_models)){
            $query = $query->with($related_models);
        }
        $result = $query->get();
        return $result;
    }
    public static function expiredFilters($key, $type = '') {
        if ($key) {
            if ($key == 'expired_ssl') {
                $query = self::whereDate('ssl_expiry', '<=', date('Y-m-d'))
                        ->leftJoin('project_details', 'project_details.project_id', '=', 'projects.id');
            } elseif ($key == 'expired_domains') {
                $query = self::whereDate('expires_date', '<=', date('Y-m-d'))
                        ->leftJoin('project_details', 'project_details.project_id', '=', 'projects.id');
            } elseif ($key == 'expired_hosting') {
                $query = self::whereDate('expires_date', '<=', date('Y-m-d'))
                        ->leftJoin('project_details', 'project_details.project_id', '=', 'projects.id');
            }
        }
        if (isset($query)) {
           return (($type == 'count') ? $query->count() :  $query->get());
            }
        }
    
}
