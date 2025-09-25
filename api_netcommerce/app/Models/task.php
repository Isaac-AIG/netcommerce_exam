<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // For using model factories
use Illuminate\Database\Eloquent\Model; // Base model class
use Illuminate\Database\Eloquent\Relations\BelongsTo; // For many-to-one relationship
use App\Enums\StatusEnum; // Enum for task status


class Task extends Model
{
    use HasFactory; // Trait to enable factory methods

    protected $table = 'tasks'; // Specify the table name
    protected $connection = 'mysql'; // Specify the database connection

    protected $fillable = [ // Mass assignable attributes
        'task',
        'description',
        'status',
        'start_date',
        'due_date',
        'user_id',
        'company_id'
    ];

    protected $casts = [
        'status'=>StatusEnum::class // Cast status to StatusEnum
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); // Relation many to one with User
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class); // Relation many to one with Company
    }
}
