<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{   
    protected $badge = "badges";

    protected $fillable = [
        "name", 
        "required_xp", 
        "description"
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_badges', 'badge_id', 'user_id')->withTimestamps();
    }

}
