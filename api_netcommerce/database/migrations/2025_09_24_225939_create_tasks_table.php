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
            $table->id(); // Primary key
            $table->string('task'); // Title of the task
            $table->text('description'); // Description of the task
            $table->timestamp('start_date'); // Start date of the task
            $table->timestamp('due_date'); // Due date of the task
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::PENDING); //Status of the task
            $table->timestamps(); // Date of creation and update
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade'); // Foreign key of the users table
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade')->onUpdate('cascade'); // Foreign key of the companies table
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
