<?php

use App\Enums\StatusEnum;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // PRIMARY KEY OF TASK
            $table->string('task'); // TITLE OF THE TASK
            $table->text('description'); // DESCRIPTION OF THE TASK
            $table->date('due_date'); // Fecha de vencimiento de la tarea
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::PENDING); // Estado de la tarea (pendiente, en progreso, retrasado, completado)
            $table->timestamps(); // Fecha y hora en la que fue creado y actualizado
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade'); // Llave foránea de la tabla users
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade')->onUpdate('cascade'); // Llave foránea de la tabla companies
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
