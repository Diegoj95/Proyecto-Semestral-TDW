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
        Schema::create('detalle_traspasos', function (Blueprint $table) {
        
        $table->id();
        $table->string('id_traspaso');
        $table->string('id_producto');
        $table->string('cantidad');

        $table->foreign('id_traspaso')->references('id')->on('traspasos');
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
