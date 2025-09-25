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
            $table->id();
            $table->string('task'); 
            $table->text('description'); 
            $table->timestamp('start_date')->nullable(); 
            $table->timestamp('due_date')->nullable(); 
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::PENDING); 
            $table->timestamps(); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade')->onUpdate('cascade'); 
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