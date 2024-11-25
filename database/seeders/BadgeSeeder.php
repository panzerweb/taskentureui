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
            ['name' => 'Rookie', 'required_xp' => 30, 'description' => 'Awarded at Level 2', 'image' => 'images/badges/level2.svg'],
            ['name' => 'Elite', 'required_xp' => 60, 'description' => 'Awarded at Level 3', 'image' => 'images/badges/level3.svg'],
            ['name' => 'Master', 'required_xp' => 90, 'description' => 'Awarded at Level 4', 'image' => 'images/badges/level4.svg'],
            ['name' => 'Grandmaster', 'required_xp' => 120, 'description' => 'Awarded at Level 5', 'image' => 'images/badges/level5.svg'],
        ];

        foreach ($badges as $badge) {
            Badge::updateOrCreate(
                ['name' => $badge['name']], // Search criteria
                [
                    'required_xp' => $badge['required_xp'], // Values to update/create
                    'description' => $badge['description'],
                    'image' => $badge['image']
                ]
            );
        }
    }
}
