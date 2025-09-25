<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Company Model
 * 
 * Model of the companies table.
 * 
 * @property int $id
 * @property string $name
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 */
class Company extends Model
{
    use HasFactory;

    /**
     * The companies table associated with the model.
     */
    protected $table = 'companies'; 

    /**
     * The database connection used by the model.
     */
    protected $connection = 'mysql'; 

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
    ];

    /**
     * Get the tasks for the company.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }   
}
