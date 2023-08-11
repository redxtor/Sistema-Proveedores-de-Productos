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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre'); 
            $table->string('razon_social');
            $table->unsignedInteger('numero_proveedor');
            $table->date('fecha_registro');
            $table->string('RFC', 13);
            $table->binary('imagen_random')->nullable();

            // Definición de la clave foránea id_región
            $table->unsignedBigInteger('id_region');
            $table->foreign('id_region')->references('id')->on('regions');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
