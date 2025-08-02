<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Grade;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'qr_code' => fake()->sentence(),
            'image' => fake()->sentence(),
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2024,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => Grade::factory()
        ];
    }
}
