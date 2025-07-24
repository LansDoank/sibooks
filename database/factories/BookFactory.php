<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->sentence(),
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2024,
            'stock' => fake()->numberBetween(10,50),
            'kelas_id' => Kelas::factory()
        ];
    }
}
