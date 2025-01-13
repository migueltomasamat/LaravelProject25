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
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->float('metros');
            $table->integer('habitaciones');
            $table->integer('banyos');
            $table->boolean('ascensor');
            $table->enum('eficiencia',['A','B','C','D','E','F','G']);
            $table->year('anyo');
            $table->foreignId('inmueble_id')->unique()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfils');
    }
};
