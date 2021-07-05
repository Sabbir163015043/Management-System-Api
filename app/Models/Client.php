<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    public $timestamps = false;

    function getProject()
    {
        return $this->hasMany('App\Models\Project');
    }
   
}
