<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Task Model
class Task extends Model
{
    use HasFactory, SoftDeletes;

    // Specifies the database table associated with this model
    protected $table = "tasks";

    // Allows mass assignment only on these specific attributes ONLY
    protected $fillable = [
        "taskname", "description", "user_id", "is_completed", "is_favorite"
    ];

}
