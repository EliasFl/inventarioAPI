<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsientoContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asientos_contables', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->string('descripcion', 70);
            $table->unsignedBigInteger('tipo_iventario');
            $table->string('cuenta_contable', 20);
            $table->string('tipo_movimiento', 2);
            $table->decimal('monto', 7, 2);
            $table->char('estado', 1);
            $table->timestamps();

            $table->foreign('tipo_iventario')
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
        Schema::dropIfExists('asientos_contables');
    }
}
