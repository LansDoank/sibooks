<?php

namespace Database\Seeders;

use App\Models\Rack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ["name" => "A1", "category" => "Pelajaran"],
            ["name" => "A2", "category" => "Pelajaran"],
            ["name" => "B1", "category" => "Pelajaran"],
            ["name" => "B2", "category" => "Pelajaran"],
            ["name" => "C1", "category" => "Pelajaran"],
            ["name" => "C2", "category" => "Pelajaran"],
            ["name" => "D1", "category" => "Pelajaran"],
            ["name" => "D2", "category" => "Pelajaran"],
            ["name" => "E1", "category" => "Pelajaran"],
            ["name" => "E2", "category" => "Cerita"],
            ["name" => "E3", "category" => "Pelajaran"],
        ];

        foreach ($datas as $data) {
            Rack::create([
                "name" => $data['name'],
                "category" => $data['category'],
                // Kita susun URL-nya di sini menggunakan nilai name yang sedang di-loop
                "qr_code" => config('app.url') . '/peta?rack=' . $data['name'],
            ]);
        }
    }
}
