<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'project',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class); // Relation one to many with Task
    }   
}
