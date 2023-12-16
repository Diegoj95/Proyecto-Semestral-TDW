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
        Schema::create('traspasos', function (Blueprint $table) {
        $table->id();
        $table->date('fecha_traspaso');
        $table->string('id_bodega_origen');
        $table->string('id_bodega_destino');

        $table->foreign('id_bodega_origen')->references('id')->on('bodegas');
        $table->foreign('id_bodega_destino')->references('id')->on('bodegas');
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
