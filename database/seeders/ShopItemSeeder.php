<?php

namespace Database\Seeders;

use App\Models\ShopItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopItemSeeder extends Seeder
{
    public function run()
    {
        $shopItems = [
            // Items
            ['name' => 'Bronze Sword', 'description' => 'Damage +5', 'price' => 10, 'category' => 'Items', 'image' => 'images/Shop/Items/bronze-sword.svg'],
            ['name' => 'Wings', 'description' => 'Agility +10', 'price' => 20, 'category' => 'Items', 'image' => 'images/Shop/Items/wings.svg'],
            ['name' => 'Christmas Hat', 'description' => 'Intellegence +5', 'price' => 50, 'category' => 'Items', 'image' => 'images/Shop/Items/christmas-hat.svg'],
            // Pets
            ['name' => 'Dog', 'description' => 'A loyal companion', 'price' => 10, 'category' => 'Pets', 'image' => 'images/Shop/Pets/Dog.svg'],
            ['name' => 'Ice Wolf', 'description' => 'A swift and cool ally that buffs you Damage +20', 'price' => 50, 'category' => 'Pets', 'image' => 'images/Shop/Pets/ice-wolf.svg'],
            // Avatars
            ['name' => 'Emo Guy', 'description' => 'A emo emong baby avatar', 'price' => 50, 'category' => 'Avatars', 'image' => 'images/Shop/Avatars/emo-guy.svg'],
            ['name' => 'Baldimir', 'description' => 'A Vladimir inspired avatar', 'price' => 200, 'category' => 'Avatars', 'image' => 'images/Shop/Avatars/baldimir.svg'],
        ];

        foreach ($shopItems as $item){
            ShopItem::updateOrInsert(["name" => $item["name"]], $item);
        }
    }

}
