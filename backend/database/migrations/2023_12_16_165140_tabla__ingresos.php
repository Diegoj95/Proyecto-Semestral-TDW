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
        $table->string('id_proveedor');

        $table->foreign('id_proveedor')->references('id')->on('proveedores');
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
