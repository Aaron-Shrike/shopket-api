<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(ClienteSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(CategoriaProductoSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(ProductoSeeder::class);
        \App\Models\Producto::factory(20)->create();
    }
}
