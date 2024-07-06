<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InfrastructureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'sarana' => $this->faker->word(),
        'jumlah' => 1,
        'satuan' => $this->faker->word(),
        'uri' => Str::random(33),
        ];
    }
}
