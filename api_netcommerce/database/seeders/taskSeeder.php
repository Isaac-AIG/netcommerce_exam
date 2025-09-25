<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;
use App\Models\Task;

class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'task' => 'Examen Práctico', // Title of the task
            'description' => 'Desarrollar una aplicación tipo API, en donde se apliquen todos los conocimientos posibles  acerca del framework Laravel 10.x y versiones anteriores. Esta API no requiere de autenticación  para los distintos endpoints, se requiere consumir listados de tareas relacionados a usuarios y  empresas', // Description of the task
            'start_date' => now(), // Start date of the task
            'due_date' => now()->addDays(30), // Due date of the task (30 days from now)
            'status' => StatusEnum::PENDING, // Initial status of the task
            'user_id' => 1, // Assign the task to the user with ID 1
            'company_id' => 1, // Assign the task to the company with ID 1
        ]);
        Task::factory(40)->create();
    }
}
