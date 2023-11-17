<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lecturer;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 50; $i++) { 
            $dosen = Lecturer::inRandomOrder()->first();

            DB::table('students')->insert([
                'npm' => rand(5520121001, 5520121999),
                'name' => $faker->name,
                'class' => $faker->randomElement(['A', 'B', 'C', 'D', 'NR']),
                'tahun_masuk' => 2021,
                'nidn' => $dosen->nidn,
                'department_id' => $faker->randomElement([1, 2, 3]),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
