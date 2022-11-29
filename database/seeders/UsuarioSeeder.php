<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $obj = new Usuario();
        $obj->correo = "aaronrv138@gmail.com";
        $obj->contrasenia = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $obj->vigente = 1;
        $obj->tipo = 'ADM';
        $obj->codigo_cliente = 1;
        $obj->save();
    }
}
