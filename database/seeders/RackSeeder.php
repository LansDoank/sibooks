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
            [
                "name" => "A1",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
            [
                "name" => "A2",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
            [
                "name" => "B1",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
            [
                "name" => "B2",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
            [
                "name" => "C1",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
            [
                "name" => "C2",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
            [
                "name" => "D1",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
            [
                "name" => "D2",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
            [
                "name" => "E1",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
            [
                "name" => "E2",
                "coordinate" => "afawf",
                'category' => 'Cerita'
            ],
            [
                "name" => "E3",
                "coordinate" => "afawf",
                'category' => 'Pelajaran'
            ],
        ];

        foreach ($datas as $data) {
            Rack::create($data);
        }
    }
}
