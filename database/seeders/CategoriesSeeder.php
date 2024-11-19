<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['c_name' => 'Personal', 'created_at' => now(), 'updated_at' => now()],
            ['c_name' => 'Professional', 'created_at' => now(), 'updated_at' => now()],
            ['c_name' => 'Academics', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
