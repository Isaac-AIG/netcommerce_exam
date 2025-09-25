<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\user;

class companySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'NetCommerce',
            'address' => 'Av. 16 de Septiembre 730- Col. Guadalajara Centro, Piso 24, del Condominio, 44100 Guadalajara, Jal.',
        ]);
        
        Company::factory(10)->create();
    }
}
