<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('codigo')->unsigned()->autoIncrement();
            $table->string('correo', 30);
            $table->string('contrasenia', 100);
            $table->char('tipo', 3);
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
        Schema::dropIfExists('usuario');
    }
}
