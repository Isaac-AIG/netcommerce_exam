<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Faker\Provider\ar_EG\Company;

class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'task' => 'Examen Práctico',
            'description' => 'Desarrollar una aplicación tipo API, en donde se apliquen todos los conocimientos posibles  acerca del framework Laravel 10.x y versiones anteriores. Esta APIno requiere de autenticación  para los distintos endpoints, se requiere consumir listados de tareas relacionados a usuarios y  empresas',
            'due_date' => now()->addDays(30), // Fecha de vencimiento en 30 días
            'status' => 'Pendiente', // Estado inicial de la tarea
            'user_id' => 1, // Asignar la tarea al usuario con ID 1
            'company_id' => 1, // Asignar la tarea a la empresa con ID 1
        ]);
        Task::factory(40)->create();
    }
}
