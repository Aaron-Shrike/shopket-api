<?php

namespace Database\Seeders;

use App\Models\Venta;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $obj = new Venta();
        $obj->codigocliente = 1;
        $obj->codigotrabajador = 5;
        $obj->metodopago = "EFE";
        $obj->igv = 0.0;
        $obj->totalgravado = 0.0;
        $obj->totalnogravado = 0.0;
        $obj-> totalexonerado = 0.0;
        $obj->fecha = "2022-10-08";
        $obj->vigente = 1;
        $obj->save();
    }
}
