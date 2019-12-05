<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_inventario', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false);
            $table->string("descripcion", 70);
            $table->string('cuenta_contable', 20);
            $table->char('estado', 1);
            $table->char("tipo_cuenta", 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_inventario');
    }
}
