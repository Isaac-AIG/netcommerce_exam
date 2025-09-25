<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Llave primaria de usuario
            $table->string('name', 50); // Nombre del usuario
            $table->string('email', 50)->unique(); // Correo electrónico único
            $table->enum('role', ['Jr Dev', 'Mid Dev', 'Sr Dev', 'PM', 'Analyst', 'Manager', 'CEO']); // Rol del usuario (Desarrollador Jr, Desarrollador Mid, Desarrollador Sr, Project Manager, Analista, Manager o CEO)
            $table->timestamps(); // Fecha y hora en la que fue creado y actualizado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
