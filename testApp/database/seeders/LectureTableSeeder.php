<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LectureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i <= 10; $i++) { 
            DB::table('lecturers')->insert([
                'nidn' => rand(0000000000, 9999999999),
                'name' => $faker->name,
                'department_id' => $faker->randomElement([1, 2, 3]),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
