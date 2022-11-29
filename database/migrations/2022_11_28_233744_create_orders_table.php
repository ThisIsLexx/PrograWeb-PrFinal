<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_orden');
            $table->string('direccion_orden');
            $table->string('codigoP_orden');
            $table->foreignId('user_id');
            $table->date('fecha_orden');
            $table->string('comentario_orden');
            $table->integer('cantidad_orden');
            $table->float('total_orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
