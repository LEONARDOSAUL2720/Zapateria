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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->string('mensaje', 100);
            $table->string('asunto', 100);
            $table->unsignedBigInteger('destinatario_id'); // Definir el campo destinatario_id
            $table->unsignedBigInteger('remitente_id'); // Definir el campo remitente_id
            $table->foreign('destinatario_id')->references('id')->on('Usuarios')->onDelete('cascade'); // Definir la clave foránea
            $table->foreign('remitente_id')->references('id')->on('Usuarios')->onDelete('cascade'); // Definir la clave foránea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
