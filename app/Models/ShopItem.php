<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'shop_items';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_items', 'item_id', 'user_id')->withTimestamps();
    }


}
