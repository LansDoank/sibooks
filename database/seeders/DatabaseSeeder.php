<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Role;
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

        $this->call([GradeSeeder::class,BookSeeder::class]);

        Book::factory(30)->recycle([
            Grade::all()
        ])->create();

        $role = ['admin','user'];

        foreach($role as $r) {
           Role::create([
                'name' => $r,
           ]);
        }

        User::create([
            'role_id' => 1,
            'fullname' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'role_id' => 2,
            'fullname' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
        ]);

        $classrooms = ['X PH 1','X PH 2','X PH 3','X MPLB 1','X MPLB 2','X PPLG 1','XI PH 1','XI PH 2','XI PH 3','XI MPLB 1','XI MPLB 2','XI PPLG 1','XII PH 1','XII PH 2','XII MPLB 1','XII MPLB 2','XII PPLG 1','XII PPLG 2'];
        
        foreach($classrooms as $classroom) {
            Classroom::create([
                'name' => $classroom,
            ]);
        } 

    }
}
