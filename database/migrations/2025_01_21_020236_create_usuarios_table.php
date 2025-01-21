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
        Schema::create('usuarios', function (Blueprint $table) {
            
            $table->id();
            $table->string('nombre_u', 100);
            $table->string('domicilio_u', 150);
            $table->string('correo_u', 150);
            $table->string('password_u', 150); 
            $table->enum('rol', ['administrador', 'cliente'])->default('cliente'); // Definir el campo rol como ENUM
            $table->integer('estatus_u');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
