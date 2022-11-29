<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('codigo')->unsigned()->autoIncrement();
            $table->string('nombre', 50);
            $table->string('apellido_paterno', 20);
            $table->string('apellido_materno', 20);
            $table->char('dni', 8);
            $table->string('celular', 9);
            $table->string('url_imagen',150);
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
        Schema::dropIfExists('cliente');
    }
}
