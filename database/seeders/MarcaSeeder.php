<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $obj = new Marca();
        $obj->nombre = "ASRock";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "ASUS";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "msi";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "BOETEC";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "AORUS";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "BIOSTAR";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "GIGABYTE";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "ZOTAC";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "PNY";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "EVGA";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "intel";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "AMD RYZEN";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "FURY";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "VIPER";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "CORSAIR";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "HYPERX";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "T-FORCE";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "T-CREATE";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "Genius";
        $obj->vigente = 1;
        $obj->save();

        $obj = new Marca();
        $obj->nombre = "NEXXT";
        $obj->vigente = 1;
        $obj->save();
    }
}
