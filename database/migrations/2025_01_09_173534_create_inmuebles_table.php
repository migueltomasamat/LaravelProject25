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
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('numcat')->unique();
            $table->string('direccion');
            $table->integer('numero')->nullable()->default('0');
            $table->char('bloque')->nullable();
            $table->integer('piso')->nullable();
            $table->char('puerta')->nullable();
            $table->foreignId('ciudad_id')->constrained();
            //Campo que refleja la relación inmueble es_propiedad de un usuario
            $table->foreignId('propietario_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
