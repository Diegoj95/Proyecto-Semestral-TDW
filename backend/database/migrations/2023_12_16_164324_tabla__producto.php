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
        $table->id();
        $table->string('nombre');
        $table->string('descripcion');
        $table->string('precio');
        $table->string('cantidad_disponible');
        $table->string('categoria');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
