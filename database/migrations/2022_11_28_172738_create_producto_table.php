<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->integer('codigo')->unsigned()->autoIncrement();
            
            $table->string('nombre', 80);
            $table->string('presentacion', 25);
            $table->string('url_imagen',150);
            $table->float('precio', 8, 2);
            $table->float('igv', 8, 2);
            $table->boolean('afecta_igv');
            $table->smallInteger('stock');
            $table->smallInteger('stock_minimo');
            $table->boolean('vigente');
            $table->timestamps();

            $table->smallInteger('codigo_marca')->unsigned();
            $table->smallInteger('codigo_categoria')->unsigned();

            $table->foreign('codigo_marca')
                ->references('codigo')
                ->on('marca');
            $table->foreign('codigo_categoria')
                ->references('codigo')
                ->on('categoria_producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
