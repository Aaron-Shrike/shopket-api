<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nombre' => $this->faker->sentence(6, false),
            'presentacion' => $this->faker->text(15),
            'url_imagen' => $this->faker->imageUrl($width = 640, $height = 480, 'cats'),
            'precio' => $this->faker->randomFloat(2,5,20000),
            'igv' => $this->faker->randomFloat(2,6,18),
            'afecta_igv' => $this->faker->boolean(),
            'stock' => $this->faker->randomNumber(2, true),
            'stock_minimo' => $this->faker->randomNumber(1, true),
            'codigo_marca' => $this->faker->numberBetween(1, 20),
            'codigo_categoria' => $this->faker->numberBetween(1, 24),
            'vigente' => true,
        ];
    }
}
