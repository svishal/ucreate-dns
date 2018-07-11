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
}
