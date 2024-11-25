<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $avatars = [
            ['level' => 1, 'image' => 'images/avatars/level1.png', 'name' => 'Rookie'],
            ['level' => 2, 'image' => 'images/avatars/level2.png', 'name' => 'Elite'],
            ['level' => 3, 'image' => 'images/avatars/level3.png', 'name' => 'Master'],
            ['level' => 4, 'image' => 'images/avatars/level4.png', 'name' => 'Grandmaster'],
            ['level' => 5, 'image' => 'images/avatars/level5.png', 'name' => 'Epic'],
            // Add more levels as needed
        ];
    
        // To Update and not to truncate again the seeder
        foreach ($avatars as $avatar) {
            Avatar::updateOrCreate(['level' => $avatar['level']], $avatar); // Insert into `avatars` table
        }
    }
}
