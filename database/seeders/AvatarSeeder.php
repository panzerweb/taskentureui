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
            ['level' => 1, 'image' => 'images/avatars/level1.png', 'name' => 'Starter'],
            ['level' => 2, 'image' => 'images/avatars/level2.png', 'name' => 'Rookie'],
            ['level' => 3, 'image' => 'images/avatars/level3.png', 'name' => 'Elite'],
            ['level' => 4, 'image' => 'images/avatars/level4.png', 'name' => 'Master'],
            ['level' => 5, 'image' => 'images/avatars/level5.svg', 'name' => 'Conqueror'],
            ['level' => 6, 'image' => 'images/avatars/level6.svg', 'name' => 'Grand Ninja'],
            ['level' => 7, 'image' => 'images/avatars/level7.svg', 'name' => 'Grandmaster'],
            ['level' => 8, 'image' => 'images/avatars/level8.svg', 'name' => 'Knight'],
            ['level' => 9, 'image' => 'images/avatars/level9.svg', 'name' => 'Mafia Boss'],
            ['level' => 10, 'image' => 'images/avatars/level10.svg', 'name' => 'Emperor'],
            // Add more levels as needed
        ];
    
        // To Update and not to truncate again the seeder
        foreach ($avatars as $avatar) {
            Avatar::updateOrInsert(['level' => $avatar['level']], $avatar); // Insert into `avatars` table
        }
    }
}
