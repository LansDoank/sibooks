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
            'image' => '/img/barabx.jpeg',
            'title' => "Bahasa Arab",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 1
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/bindoxi (2).jpeg',
            'title' => "Bahasa Indonesia",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/bindoxi.jpeg',
            'title' => "Bahasa Indonesia",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/binggrisx.jpeg',
            'title' => "Bahasa Inggris",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 1
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/dpplgx.jpeg',
            'title' => "Dasar Dasar Perangkat Lunak dan Gim",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 1
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/dpplgxi.jpeg',
            'title' => "Dasar Dasar Perangkat Lunak dan Gim",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/foxi.jpeg',
            'title' => "Front Office",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/mtkx.jpeg',
            'title' => "Matematika",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 1
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/mtkxi.jpeg',
            'title' => "Matematika",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/otkhxii.jpeg',
            'title' => "Otomatisasi Tata Kelola Humas dan Keprotokolan",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 3
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/pabpxi.jpeg',
            'title' => "Pendidikan Agama dan Budi Pekerti",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/pabpxii.jpeg',
            'title' => "Pendidikan Agama dan Budi Pekerti",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 3
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/pkkxi (2).jpeg',
            'title' => "Projek Kreatif dan Kewirausahaan",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/pkkxi.jpeg',
            'title' => "Projek Kreatif dan Kewirausahaan",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/pksxi.jpeg',
            'title' => "Pengelolaan Keuangan Sederhana",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/pkxi.jpeg',
            'title' => "Pengelolaan Kearsipan",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/ppknxi.jpeg',
            'title' => "Pendidikan Pancasila dan Kewarganegaraan",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/sejarahxi.jpeg',
            'title' => "Sejarah Indonesia",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/tikx.jpeg',
            'title' => "Teknologi Informasi dan Komunikasi",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 1
        ]);
        Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug(fake()->sentence()),
            'image' => '/img/tpxi.jpeg',
            'title' => "Teknologi Perkantoran",
            'slug' => Str::slug(fake()->sentence()) ,
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'year' => 2025,
            'stock' => fake()->numberBetween(10,50),
            'grade_id' => 2
        ]);
    }
}
