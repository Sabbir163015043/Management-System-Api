<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
    public $timestamps = false;

    function getClient()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
