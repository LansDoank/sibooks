<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            "name" => 'X'
        ]);
        Kelas::create([
            "name" => 'XI'
        ]);
        Kelas::create([
            "name" => 'XII'
        ]);
    }
}
