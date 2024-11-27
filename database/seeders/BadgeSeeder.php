<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Badge;

class BadgeSeeder extends Seeder
{
    public function run()
    {
        $badges = [
            ['name' => 'Task Rookie', 'required_xp' => 30, 'description' => 'Levelled up to level 2', 'image' => 'images/badges/level2.svg'],
            ['name' => 'Elite Streaker', 'required_xp' => 60, 'description' => 'Reaching Level 3 by completing Task', 'image' => 'images/badges/level3.svg'],
            ['name' => 'Hunter', 'required_xp' => 90, 'description' => 'You have become a Fierce Task Hunter', 'image' => 'images/badges/level4.svg'],
            ['name' => 'Valor', 'required_xp' => 120, 'description' => 'Befitting of a Productive Soldier, a Valor Medal', 'image' => 'images/badges/level5.svg'],
            ['name' => 'Ascendant', 'required_xp' => 150, 'description' => 'You are ready to ascend to higher status', 'image' => 'images/badges/level6.svg'],
            ['name' => 'Night Owl', 'required_xp' => 180, 'description' => 'Get some sleep! You are so productive.', 'image' => 'images/badges/level7.svg'],
            ['name' => 'Alpha Bear', 'required_xp' => 210, 'description' => 'Some Alpha Bear you are!', 'image' => 'images/badges/level8.svg'],
        ];

        foreach ($badges as $badge) {
            Badge::updateOrCreate(
                ['name' => $badge['name']], $badge // Search criteria
            );
        }
    }
}
