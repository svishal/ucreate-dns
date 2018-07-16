<?php

namespace App\Model;
use App\Model\ProjectDetail;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
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
                $query = ProjectDetail::whereNotNull('ssl')->where('ssl', TRUE)
                    ->join('projects', 'projects.id', '=', 'project_details.project_id');
            }elseif($filter_by_field=='having_delegate_access'){
                $query = ProjectDetail::whereNotNull('delegate_access_account')
                    ->join('projects', 'projects.id', '=', 'project_details.project_id');
            }else{
                $query = ProjectDetail::whereDate($filter_by_field,'<=',$date)
                    ->join('projects', 'projects.id', '=', 'project_details.project_id');
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
        if(count($query)){
            $result = $query->get();
        }
        return $result;
    }
}
