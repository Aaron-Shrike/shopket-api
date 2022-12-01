<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $obj = new Cliente();
        $obj->nombre = "Aarón";
        $obj->apellido_paterno = "Rojas";
        $obj->apellido_materno = "Vera";
        $obj->dni = "73976770";
        $obj->celular = "978488529";
        $obj->direccion = "asentito";
        $obj->url_imagen = "https://via.placeholder.com/200x200.png/00bbee?text=cats+assumenda";
        $obj->vigente = 1;
        $obj->save();
    }
}
