<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
 */
class taskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Task::class;


    public function definition(): array
    {
        return [
            'task' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(StatusEnum::cases()),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'company_id' => \App\Models\Company::inRandomOrder()->first()->id,
        ];
    }
}
