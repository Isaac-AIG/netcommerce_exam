<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User'); //Relación muchos a uno con User
    }
    public function company()
    {
        return $this->belongsTo('App\Models\Company'); //Relación muchos a uno con Company
    }
}
