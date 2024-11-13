<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    protected $table = "trash";

    protected $fillable = [
        'task_id', 'taskname', 'description', 'user_id',
    ];
    
    public $timestamps = true; // Ensure timestamps are enabled

}
