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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
        $table->string('nombre_p', 100);
        $table->string('descripcion_p', 150);
        $table->decimal('precio_p', 10, 2); // Decimal para el precio
        $table->integer('existencias_p');  // Integer para las existencias
        $table->integer('estatus')->default(1); // Cambiar a 'estatus' y dar un valor predeterminado
        $table->unsignedBigInteger('sucursal_id'); 
        $table->foreign('sucursal_id')->references('id')->on('Sucursales')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
