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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_v', 100);
            $table->string('total_v', 150);
            $table->integer('cantidad_v');
            $table->unsignedBigInteger('usuario_id'); // Definir el campo usuario_id
            $table->foreign('usuario_id')->references('id')->on('Usuarios')->onDelete('cascade'); // Definir la clave foránea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
