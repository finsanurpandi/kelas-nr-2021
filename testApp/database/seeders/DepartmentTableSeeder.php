<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'code' => '55201',
                'inisial' => 'IF',
                'name' => 'Teknik Informatika',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'code' => '26201',
                'inisial' => 'TI',
                'name' => 'Teknik Industri',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'code' => '22201',
                'inisial' => 'SI',
                'name' => 'Teknik Sipil',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
