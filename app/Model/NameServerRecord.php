<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NameServerRecord extends Model
{
    protected $fillable = [
        'a', 'aaaa', 'cname', 'mx', 'ns', 'ptr', 'soa', 'srv', 'txt', 'caa', 'project_id'
    ];
}
