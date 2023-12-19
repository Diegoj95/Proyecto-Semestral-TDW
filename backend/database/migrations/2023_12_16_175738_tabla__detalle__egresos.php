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
        Schema::create('detalle_egresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_egreso');
            $table->unsignedBigInteger('id_producto');
            $table->string('cantidad');
            $table->timestamps();
            $table->foreign('id_egreso')->references('id')->on('egresos');
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
