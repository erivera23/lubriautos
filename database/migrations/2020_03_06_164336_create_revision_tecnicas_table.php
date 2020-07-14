<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionTecnicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision_tecnicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_cliente');
            $table->Integer('id_vehiculo');
            $table->date('fecha');
            $table->Integer('id_detalle');
            //Validar campos
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
        Schema::dropIfExists('revision_tecnicas');
    }
}
