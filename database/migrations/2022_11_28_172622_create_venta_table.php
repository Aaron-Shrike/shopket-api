<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->integer('codigo')->unsigned()->autoIncrement();
            $table->char('metodo_pago', 3);
            $table->dateTime('fecha', $precision = 0);
            $table->float('igv', 8, 2);
            $table->float('total_gravado', 8, 2);
            $table->float('total_no_gravado', 8, 2);
            $table->boolean('vigente');
            $table->timestamps();

            $table->integer('codigo_cliente')->unsigned();

            $table->foreign('codigo_cliente')
                ->references('codigo')
                ->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
