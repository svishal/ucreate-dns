<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    protected $table = 'project_details';
    
    static function project() {
     return $this->belongsTo('App/Model/Project');   
    }
    
}
