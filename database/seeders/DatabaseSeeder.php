<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Kelas;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([KelasSeeder::class]);

        Book::factory(30)->recycle([
            Kelas::all()
        ])->create();

        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
