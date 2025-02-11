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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id_alumno');
            $table->string('matricula');
            $table->string('nombre');
            $table->string('ap_p');
            $table->string('ap_m');
            $table->dateTime ('fecha_n');
            $table->string('genero');
            $table->unsignedBigInteger('id_universidad2');
            $table->unsignedBigInteger('id_carrera2');
            $table->unsignedBigInteger('id_grupo2');
            $table->timestamps();

            $table->foreign('id_universidad2')->references('id_universidad')->on('universidades')->onDelete('cascade');
            $table->foreign('id_carrera2')->references('id_carrera')->on('carreras')->onDelete('cascade');
            $table->foreign('id_grupo2')->references('id_grupo')->on('grupos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
