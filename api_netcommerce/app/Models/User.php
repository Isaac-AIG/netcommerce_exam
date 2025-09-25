<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\RolesEnum;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'email',
        'role',
    ];

    protected $casts = [
        'role'=>RolesEnum::class
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class); // Relation one to many with Task
    }
}
