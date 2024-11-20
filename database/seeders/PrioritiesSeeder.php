<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('priorities')->insert([
            ['name' =>  'High', 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  'Medium', 'created_at' => now(), 'updated_at' => now()],
            ['name' =>  'Low', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
