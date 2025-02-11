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
        Schema::create('carreras', function (Blueprint $table) {
            $table->bigIncrements('id_carrera');
            $table->string('nombre');
            $table->string('estatus');
            $table->unsignedBigInteger('id_universidad1'); 
            $table->timestamps();
            
            $table->foreign('id_universidad1')->references('id_universidad')->on('universidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
