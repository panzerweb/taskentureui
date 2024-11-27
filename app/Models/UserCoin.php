<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCoin extends Model
{
    protected $table = "user_coins";

    protected $fillable = [
        'user_id', 'gold_coins', 'diamonds', 'task_id',
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }


}
