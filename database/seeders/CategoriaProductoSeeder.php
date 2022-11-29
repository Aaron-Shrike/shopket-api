<?php

namespace Database\Seeders;

use App\Models\CategoriaProducto;
use Illuminate\Database\Seeder;

class CategoriaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $obj = new CategoriaProducto();
        $obj->nombre = "Laptop Intel";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Laptop AMD";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Tablets";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Memoria para Laptop";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Accesorios para Laptop";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Memoria USB - Micro SD";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Placas Madre";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Tarjetas Gráficas";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Procesadores";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Memorias RAM";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Sistema de Refrigeración";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Almacenamiento HDD & SSD";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Case y Accesorios";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Estabilizador, UPS y Supresor";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Grabadora PC";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Monitores";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Parlantes";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Proyector";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Ecran";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Rack para proyector";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Rack para monitor";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Redes Alámbricas";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Redes Inalámbricas";
        $obj->vigente = 1;
        $obj->save();

        $obj = new CategoriaProducto();
        $obj->nombre = "Sistema de Vigilancia";
        $obj->vigente = 1;
        $obj->save();
    }
}
