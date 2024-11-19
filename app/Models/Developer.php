<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    public static function allDevs(){
        $devs = [
            [
                'id' => 1,
                'name'=> 'Selwyn Villar',
                'role'=> 'Project Leader',
                'profile_pic'=> 'images/devs/dev1.jpg',
                'cover_photo'=> 'images/devs/cover1.jpg',
                'education' => 'Davao del Norte State College',
                'skills' => ["HTML", "CSS", "JavaScript", "Php", "Bootstrap", "Laravel", "MySQL", "Canva"],
                'address' => 'Bangoy St. Panabo City'
            ],
            [
                'id' => 2,
                'name'=> 'Joseph Paquinol',
                'role'=> 'Lead Developer',
                'profile_pic'=> 'images/devs/dev2.jpg',
                'cover_photo'=> 'images/devs/cover2.jpg',
                'education' => 'Davao del Norte State College',
                'skills' => ["HTML", "CSS", "Php", "Bootstrap", "Laravel", "MySQL", "PhotoShop", "Canva"],
                'address' => 'Neighborhood, Brgy. New Pandan, Panabo City'
            ],
            [
                'id' => 3,
                'name'=> 'Cyrel Morales',
                'role'=> 'Web Developer',
                'profile_pic'=> 'images/devs/dev3.jpg',
                'cover_photo'=> 'images/devs/cover3.jpg',
                'education' => 'Davao del Norte State College',
                'skills' => ["HTML", "CSS", "Php", "Bootstrap", "Laravel", "MySQL"],
                'address' => 'Kauswagan, Panabo City'
            ],
            [
                'id' => 4,
                'name'=> 'Stephanie Losabia',
                'role'=> 'Graphic Designer',
                'profile_pic'=> 'images/devs/dev4.jpg',
                'cover_photo'=> 'images/devs/cover4.jpg',
                'education' => 'Davao del Norte State College',
                'skills' => ["HTML", "CSS", "Php", "Bootstrap", "Laravel", "MySQL", "Canva", "Ibis Paint"],
                'address' => 'University Of Mindanao, Panabo City'
            ]
        ];

        return $devs;
    }

    public static function findDeveloper(int $id){
        return Arr::first(static::allDevs(), fn($dev) => $dev['id'] === $id);
    }
}
