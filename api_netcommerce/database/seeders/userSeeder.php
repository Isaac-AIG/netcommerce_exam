<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Isaac Iniguez',
            'email' => 'ige335@gmail.com',
            'role' => RolesEnum::JR_DEV,
        ]);

        User::factory(20)->create();
    }
}
