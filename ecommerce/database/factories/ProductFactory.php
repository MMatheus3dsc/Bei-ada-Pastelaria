<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), // ou ->words(2, true) pra dois nomes
            'type' => $this->faker->randomElement(['Doce', 'Salgado', ]),
            'description' => $this->faker->sentence(8),
            'price' => $this->faker->randomFloat(2, 1, 100), // de 1,00 a 100,00
            'image' => $this->faker->imageUrl(640, 480, 'food', true), // imagem fake de comida
            'stock' => $this->faker->numberBetween(0, 50),
        ];
    }
}
