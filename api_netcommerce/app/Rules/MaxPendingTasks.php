<?php

namespace App\Rules;

use App\Enums\StatusEnum;
use App\Models\Task;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxPendingTasks implements ValidationRule
{
    /**
     * Create a new rule instance.
     *
     * @param int $maxTasks
     */
    public function __construct(private int $maxTasks) {}

    /**
     * Validate the given attribute.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): void  $fail
     * @return void
     */
    public function validate(String $attribute, mixed $value, Closure $fail): void
    {
        $pendingTasksCount = Task::where('user_id', $value)
            ->where('status', StatusEnum::PENDING->value)
            ->count();

        if ($pendingTasksCount >= $this->maxTasks) {
            $fail("The user has reached the maximum number of pending tasks ({$this->maxTasks}).");
        }
    }
}