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
            'task' => 'Examen Práctico',
            'description' => 'Desarrollar una aplicación tipo API, en donde se apliquen todos los conocimientos posibles  acerca del framework Laravel 10.x y versiones anteriores. Esta API no requiere de autenticación  para los distintos endpoints, se requiere consumir listados de tareas relacionados a usuarios y  empresas', // Description of the task
            'start_date' => now(), 
            'due_date' => now()->addDays(30), 
            'status' => StatusEnum::PENDING,
            'user_id' => 1,
            'company_id' => 1,
        ]);
        Task::factory(40)->create();
    }
}
