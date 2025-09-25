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
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // Llave primaria de la compañía
            $table->string('name', 100); // Nombre de la compañía
            $table->string('address', 100); // Dirección de la compañía
            $table->string('project', 50); // Proyecto de trabajo de la compañía
            $table->timestamps(); // Fecha y hora en la que fue creado y actualizado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
