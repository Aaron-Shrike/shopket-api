<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->integer('codigo')->unsigned()->autoIncrement();
            $table->smallInteger('cantidad');
            $table->float('precio', 8, 2);
            $table->float('igv', 8, 2);
            $table->boolean('afecta_igv');
            $table->boolean('vigente');
            $table->timestamps();

            $table->integer('codigo_venta')->unsigned();
            $table->integer('codigo_producto')->unsigned();

            $table->foreign('codigo_venta')
                ->references('codigo')
                ->on('venta');
            $table->foreign('codigo_producto')
                ->references('codigo')
                ->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_venta');
    }
}
