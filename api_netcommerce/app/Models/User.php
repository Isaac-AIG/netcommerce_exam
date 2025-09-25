<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\HasMany; 
use App\Enums\RolesEnum;

/**
 * User Model
 * 
 * Model of the users table.
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property RolesEnum $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 */
class User extends Model
{
    use HasFactory; 

    /**
     * The users table associated with the model.
     */
    protected $table = 'users'; 

    /**
     * The database connection used by the model.
     */
    protected $connection = 'mysql'; 

    /**
     * @var array
     */
    protected $fillable = [ 
        'name',
        'email',
        'role',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'role'=>RolesEnum::class 
    ];

    /**
     * Get the tasks for the user.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class); 
    }
}
