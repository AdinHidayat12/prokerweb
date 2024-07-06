<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(),
            'preview' => $this->faker->paragraph(1),
            'uri' => Str::random(40),
            'teks' => $this->faker->paragraph(20),
            'gambar' => null,
        ];
    }
}
