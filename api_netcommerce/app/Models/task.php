<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // For using model factories
use Illuminate\Database\Eloquent\Model; // Base model class
use Illuminate\Database\Eloquent\Relations\BelongsTo; // For many-to-one relationship
use App\Enums\StatusEnum; // Enum for task status

/**
 * Task Model
 * 
 * Model of the tasks table.
 * 
 * @property int $id
 * @property string $task
 * @property string|null $description
 * @property StatusEnum $status
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $due_date
 * @property int $user_id
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 */
class Task extends Model
{
    use HasFactory;

    /**
     * The tasks table associated with the model.
     */
    protected $table = 'tasks'; 

    /**
     * The database connection used by the model.
     */
    protected $connection = 'mysql'; 

    /**
     * @var array
     */
    protected $fillable = [ 
        
        'task',
        'description',
        'status',
        'start_date',
        'due_date',
        'user_id',
        'company_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status'=>StatusEnum::class
    ];

    /**
     * Get the user that owns the task.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the company that owns the task.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class); 
    }
}
