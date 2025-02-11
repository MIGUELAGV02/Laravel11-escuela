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
        Schema::create('grupos', function (Blueprint $table) {
            $table->bigIncrements('id_grupo');
            $table->string('nombre');
            $table->string('clave');
            $table->string('estatus');
            $table->unsignedBigInteger('id_carrera1'); // Clave foránea
            $table->timestamps();
        
            // Definir la clave foránea
            $table->foreign('id_carrera1')->references('id_carrera')->on('carreras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
