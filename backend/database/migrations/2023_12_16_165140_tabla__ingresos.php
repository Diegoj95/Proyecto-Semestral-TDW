<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
        $table->id();
        $table->date('fecha_ingreso');
        $table->unsignedBigInteger('id_bodega');
        $table->timestamps();

        $table->foreign('id_bodega')->references('id')->on('bodegas');

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
