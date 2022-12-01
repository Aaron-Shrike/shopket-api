<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $obj = new Producto();
        $obj->nombre = "Memoria 8Gb DDR4 HYPERX Predator";
        $obj->presentacion = "Black RGB BUS 3000MHz";
        $obj->url_imagen = "https://via.placeholder.com/200x200.png/00bbee?text=cats+assumenda";
        $obj->precio = 183.80;
        $obj->igv = 18.00;
        $obj->afecta_igv = 1;
        $obj->stock = 10;
        $obj->stock_minimo = 2;
        $obj->vigente = 1;
        $obj->codigo_marca = 16;
        $obj->codigo_categoria = 10;
        $obj->save();

        $obj = new Producto();
        $obj->nombre = "Laptop ASUS Expertbook P2451FA";
        $obj->presentacion = "Pro StarBlack";
        $obj->url_imagen = "https://via.placeholder.com/200x200.png/00bbee?text=cats+assumenda";
        $obj->precio = 3263.72;
        $obj->igv = 18.00;
        $obj->afecta_igv = 1;
        $obj->stock = 10;
        $obj->stock_minimo = 2;
        $obj->vigente = 1;
        $obj->codigo_marca = 2;
        $obj->codigo_categoria = 1;
        $obj->save();

        $obj = new Producto();
        $obj->nombre = "Placa ASRock B560M-HDV";
        $obj->presentacion = "DDR4 LGA 1200";
        $obj->url_imagen = "https://via.placeholder.com/200x200.png/00bbee?text=cats+assumenda";
        $obj->precio = 387.06;
        $obj->igv = 18.00;
        $obj->afecta_igv = 1;
        $obj->stock = 10;
        $obj->stock_minimo = 2;
        $obj->vigente = 1;
        $obj->codigo_marca = 1;
        $obj->codigo_categoria = 7;
        $obj->save();

        $obj = new Producto();
        $obj->nombre = "msi GEFORCE GTX 150Ti 4Gb GDDR5";
        $obj->presentacion = "128bits OC";
        $obj->url_imagen = "https://via.placeholder.com/200x200.png/00bbee?text=cats+assumenda";
        $obj->precio = 933.60;
        $obj->igv = 18.00;
        $obj->afecta_igv = 1;
        $obj->stock = 10;
        $obj->stock_minimo = 2;
        $obj->vigente = 1;
        $obj->codigo_marca = 3;
        $obj->codigo_categoria = 8;
        $obj->save();

        $obj = new Producto();
        $obj->nombre = "Procesador AMD RYZEN 5 3600";
        $obj->presentacion = "3.6GHz 35Mb 4core AM4";
        $obj->url_imagen = "https://via.placeholder.com/200x200.png/00bbee?text=cats+assumenda";
        $obj->precio = 657.41;
        $obj->igv = 18.00;
        $obj->afecta_igv = 1;
        $obj->stock = 10;
        $obj->stock_minimo = 2;
        $obj->vigente = 1;
        $obj->codigo_marca = 12;
        $obj->codigo_categoria = 9;
        $obj->save();

        $obj = new Producto();
        $obj->nombre = "Monitor LED 23.8'' msi Optix G241 Gaming 1920x1080 HDMI DP 1ms";
        $obj->presentacion = "144Hz FreeSync";
        $obj->url_imagen = "https://via.placeholder.com/200x200.png/00bbee?text=cats+assumenda";
        $obj->precio = 960.83;
        $obj->igv = 18.00;
        $obj->afecta_igv = 1;
        $obj->stock = 10;
        $obj->stock_minimo = 2;
        $obj->vigente = 1;
        $obj->codigo_marca = 3;
        $obj->codigo_categoria = 16;
        $obj->save();

        $obj = new Producto();
        $obj->nombre = "Parlantes Genius SP-Q160";
        $obj->presentacion = "Red USB Powe 6W RMS";
        $obj->url_imagen = "https://via.placeholder.com/200x200.png/00bbee?text=cats+assumenda";
        $obj->precio = 35.01;
        $obj->igv = 18.00;
        $obj->afecta_igv = 1;
        $obj->stock = 10;
        $obj->stock_minimo = 2;
        $obj->vigente = 1;
        $obj->codigo_marca = 19;
        $obj->codigo_categoria = 17;
        $obj->save();

        $obj = new Producto();
        $obj->nombre = "Camara inteligente NHC-0610 Wi-Fi NEXXT Home 1080p";
        $obj->presentacion = "Exteriores/Interiores";
        $obj->url_imagen = "https://via.placeholder.com/200x200.png/00bbee?text=cats+assumenda";
        $obj->precio = 171.16;
        $obj->igv = 18.00;
        $obj->afecta_igv = 1;
        $obj->stock = 10;
        $obj->stock_minimo = 2;
        $obj->vigente = 1;
        $obj->codigo_marca = 20;
        $obj->codigo_categoria = 24;
        $obj->save();
    }
}
