<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\StatusEnum;


class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task',
        'description',
        'status',
        'due_date',
        'user_id',
        'company_id'
    ];

    protected $casts = [
        'status'=>StatusEnum::class
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
