<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // For using model factories
use Illuminate\Database\Eloquent\Model; // Base model class
use Illuminate\Database\Eloquent\Relations\HasMany; // For one-to-many relationship
use App\Enums\RolesEnum; // Enum for user roles

class User extends Model
{
    use HasFactory; // Trait to enable factory methods

    protected $table = 'users'; // Specify the table name
    protected $connection = 'mysql'; // Specify the database connection

    protected $fillable = [ // Mass assignable attributes
        'name',
        'email',
        'role',
    ];

    protected $casts = [
        'role'=>RolesEnum::class // Cast role to RolesEnum
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class); // Relation one to many with Task
    }
}
