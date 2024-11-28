<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopItemSeeder extends Seeder
{
    public function run()
    {
        DB::table('shop_items')->insert([
            // Items
            ['name' => 'Kyot miming', 'description' => 'Aura +9999', 'price' => 100, 'category' => 'Items', 'image' => 'images/logo/EventPets.png'],
            ['name' => 'Balay ni Mayang', 'description' => 'Safe ka sakoa <3', 'price' => 120, 'category' => 'Items', 'image' => 'images/logo/EventShop.png'],
            ['name' => 'Hi Kras', 'description' => 'Loyal ko nemu krasdaasdasas', 'price' => 500, 'category' => 'Items', 'image' => 'images/logo/EventGame.png'],
            // Pets
            ['name' => 'Fire Dragon', 'description' => 'A loyal fire-breathing companion', 'price' => 1000, 'category' => 'Pets', 'image' => 'images/fire_dragon.png'],
            ['name' => 'Ice Wolf', 'description' => 'A swift and cool ally', 'price' => 800, 'category' => 'Pets', 'image' => 'images/ice_wolf.png'],
            // Avatars
            ['name' => 'Knight', 'description' => 'A valiant knight avatar', 'price' => 300, 'category' => 'Avatars', 'image' => 'images/knight_avatar.png'],
            ['name' => 'Mage', 'description' => 'A wise mage avatar', 'price' => 300, 'category' => 'Avatars', 'image' => 'images/mage_avatar.png'],
        ]);
    }
}
