<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetalleVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $obj = new DetalleVenta();
        $obj->codigoproducto = 2;
        $obj->codigoventa = 1;
        $obj->cantidad = 1;
        $obj->precio = 6.90;
        $obj->afectacionIGV = "GRA";
        $obj->igv = 1.242;
        $obj->isc = 0.00;
        $obj->vigente = 1;
        $obj->save();
    }
}
