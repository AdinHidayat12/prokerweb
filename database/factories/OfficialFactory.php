<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OfficialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'uri' => Str::random(30),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'jabatan' => $this->faker->word()
        ];
    }
}
