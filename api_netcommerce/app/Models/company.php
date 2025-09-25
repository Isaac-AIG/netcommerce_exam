<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // For using model factories
use Illuminate\Database\Eloquent\Model; // Base model class
use Illuminate\Database\Eloquent\Relations\HasMany; // For one-to-many relationship


class Company extends Model
{
    use HasFactory; // Trait to enable factory methods

    protected $table = 'companies'; // Specify the table name
    protected $connection = 'mysql'; // Specify the database connection

    protected $fillable = [ // Mass assignable attributes
        'name',
        'address',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class); // Relation one to many with Task
    }   
}
