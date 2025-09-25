<?php

use App\Enums\RolesEnum;
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
            $table->id(); // Primary key of user
            $table->string('name', 50); // User's name
            $table->string('email', 50)->unique(); // email of the user
            $table->enum('role', array_column(RolesEnum::cases(), 'value')); // Role of the user (Jr_Dev, Mid_Dev, Sr_Dev, PM, Analyst, Manager, CEO)
            $table->timestamps(); // Date and time when it was created and updated
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
