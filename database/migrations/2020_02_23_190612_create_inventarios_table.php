<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad');
            $table->integer('tipo'); //Tipo se refiere a si es entrada o salida de productos. 1=Entrada 0=Salida
            $table->string('concepto');
            $table->date('fecha');
            $table->string('referencia'); //# de referencia de documento (Factura o recibo)
            $table->foreign('producto_id')->references('id')->on('productos');
            
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
        Schema::dropIfExists('inventarios');
    }
}
