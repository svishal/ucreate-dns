<?php

namespace App\Model;

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
    public static function searchProject($key){
        return self::where([['short_name', 'iLIKE', '%' .strtolower($key) . '%']])
               ->orWhere([['name', 'iLIKE', '%' .strtolower($key) . '%']]) 
                ->get();
    }
}
