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
        Schema::create('inventario_bodegas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bodega');
            $table->unsignedBigInteger('id_producto');
            $table->string('cantidad_producto');
            $table->timestamps();

            $table->foreign('id_bodega')->references('id')->on('bodegas');
            $table->foreign('id_producto')->references('id')->on('productos');
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
