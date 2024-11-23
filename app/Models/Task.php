<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Priority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Task Model
class Task extends Model
{
    use HasFactory, SoftDeletes;

    // Specifies the database table associated with this model
    protected $table = "tasks";

    // Allows mass assignment only on these specific attributes ONLY
    protected $fillable = [
                        "taskname", 
                        "description", 
                        "user_id", 
                        "is_completed", 
                        "is_favorite", 
                        "priority_id", 
                        "category_id", 
                        "due_date"
                    ];

    public function priority(){
        return $this->belongsTo(Priority::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function show($id){
        $task = Task::find($id); 

    if ($task) {
        return $task->id;  // Access the 'id' field correctly
    }
    return 'Task not found';
    }
}
