<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf', 11)->unique()->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 20)->nullable();
            
            $table->timestamps();
        },'utf8mb4_unicode_ci');
    }

  
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};