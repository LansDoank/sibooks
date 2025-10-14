<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Grade;
use Illuminate\Support\Str;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/ipas.jpg',
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2024,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 1
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/japan.jpeg',
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 1
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/totoro.jpg',
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2024,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 1
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/luffy.jpeg',
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 1
        ]);
    }
}
