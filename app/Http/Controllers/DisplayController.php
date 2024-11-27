<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Badge;
use App\Models\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    
    
    /*
         ==========================================================
        ||                  DISPLAY FEATURES                     ||
        ==========================================================
        
        Description: 
        The Section for all the display or view functions
    */
    //============================================
    // Viewing All Tasks
    //============================================
    public function index() {
        // Retrieve all tasks associated with the currently authenticated user
        // The `auth()->id()` method gets the ID of the logged-in user
        $user = auth()->user();
        $badges = Badge::all();
        $tasks = Task::where('user_id', auth()->id())->paginate(5);
        
        // Pass the retrieved tasks to the 'home' view for rendering
        // The 'compact('tasks')' creates an array with the 'tasks' variable for the view
        return view('home', compact('user','tasks', 'badges'));
    
    }

    //============================================
    // Favorite Task Display
    //============================================

    public function starredIndex(){
        // Retrieve all tasks associated with the currently authenticated user
        // The `auth()->id()` method gets the ID of the logged-in user
        $user = auth()->user();
        $tasks = Task::where('user_id', auth()->id())->where('is_favorite', true)->paginate(5);
        $badges = Badge::all();
    
        // Pass the retrieved tasks to the 'starred' view for rendering
        // The 'compact('tasks')' creates an array with the 'tasks' variable for the view
        return view('pages.starred', compact('user','tasks', 'badges'));
    }

    //============================================
    // Deleted Task Display
    //============================================
    public function trashIndex(){
        // Retrieve all tasks associated with the currently authenticated user
        // The `auth()->id()` method gets the ID of the logged-in user
        $tasks = Trash::where('user_id', auth()->id())->paginate(5);
        $badges = Badge::all();
        
        // Pass the retrieved tasks to the 'starred' view for rendering
        // The 'compact('tasks')' creates an array with the 'tasks' variable for the view
        return view('pages.trash', compact('tasks', 'badges'));
    }

    public function userIndex(){
        return view('pages.useredit');
    }
}
