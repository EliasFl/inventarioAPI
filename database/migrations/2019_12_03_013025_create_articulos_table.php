<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->unsignedBigInteger('almacen_id');
            $table->string('descripcion', 70);
            $table->integer('existencia');
            $table->unsignedBigInteger('tipo_inventario');
            $table->decimal('costo', 18, 2);
            $table->char('estado', 1);
            $table->timestamps();

            $table->foreign('almacen_id')
                  ->references('id')->on('almacenes');
            $table->foreign('tipo_inventario')
                  ->references('id')->on('tipos_inventario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
