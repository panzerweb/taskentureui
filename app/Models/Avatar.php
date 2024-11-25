<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $avatar = "avatars";

    protected $fillable = [
        "image"
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_avatars', 'avatar_id', 'user_id');
    }
    public function getAvatarImageAttribute()
    {
        return asset($this->image);
    }

}
