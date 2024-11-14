<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Trash;
use Illuminate\Http\Request;
use Dotenv\Exception\ValidationException;

// Description: 
// Main Controller for the Task Model

class TaskController extends Controller
{
    //============================================
    // Creating Task
    //============================================
    public function createTask(Request $request){
        $incomingFields = $request->validate([
            "taskname" => "required|max:255",
        ]);

        $incomingFields['taskname'] = strip_tags($incomingFields['taskname']);
        $incomingFields['user_id'] = auth()->id();
        Task::create($incomingFields);
        return redirect("/home");

    }
    //============================================
    // Viewing All Tasks
    //============================================
    public function index() {
        // Retrieve all tasks associated with the currently authenticated user
        // The `auth()->id()` method gets the ID of the logged-in user
        $tasks = Task::where('user_id', auth()->id())->get();
    
        // Pass the retrieved tasks to the 'home' view for rendering
        // The 'compact('tasks')' creates an array with the 'tasks' variable for the view
        return view('home', compact('tasks'));
    }
    //============================================
    // Toggling as Complete
    //============================================
    public function toggleComplete($id){
        $task = Task::findOrFail($id);
        //Toggle the "is_completed" status
        $task->is_completed = !$task->is_completed;
        $task->save();
        
        return redirect()->back()->with('status', 'Task status updated!');
    }
    //============================================
    // Updating feature
    //============================================
    public function editTask(Request $request, Task $task) {
        try {
            $request->validate([
                "taskname" => "required|max:255",
                "description" => "nullable|max:255"
            ]);
    
            // Update the task with validated input
            $task->update($request->only(['taskname', 'description']));

            // Call the currentUrl function with a custom message.
            return $this->currentUrl("Task Updated");


        } catch (ValidationException $error) {
            return redirect()->route('home')->withErrors($error->errors())->withInput();
        }
    }

    //============================================
    // Deleting Feature Soft Delete and Deliver to Task
    //============================================
    public function deleteTask($id){
        $task = Task::findOrFail($id);

        Trash::create([
            "taskname" => $task->taskname,
            "description"=> $task->description,
            "user_id" => $task->user_id,
            "deleted_at" => now(),
        ]);

        $task->delete();

        return redirect()->route("home")->with("status","Task moved to Trash");
    }

    //============================================
    // Mark Task as Favorite
    //============================================
    
    public function markAsFavorite($id){
        $task = Task::findOrFail($id);
        $task->is_favorite = !$task->is_favorite;
        $task->save();

        // Call the currentUrl function with a custom message.
        return $this->currentUrl("Task Marked");
    }

    //============================================
    // Favorite Task Display
    //============================================

    public function starredIndex(){
        // Retrieve all tasks associated with the currently authenticated user
        // The `auth()->id()` method gets the ID of the logged-in user
        $tasks = Task::where('user_id', auth()->id())->get();
    
        // Pass the retrieved tasks to the 'starred' view for rendering
        // The 'compact('tasks')' creates an array with the 'tasks' variable for the view
        return view('pages.starred', compact('tasks'));
    }

    //============================================
    // ===Check the previous URL to decide where to redirect===
    // The url()->previous() helper, helps to check the previous URL. 
    // Based on that, redirect back to the previous page (starred or home).
    //============================================
    public function currentUrl($message){
        if(str_contains(url()->previous(), route('pages.starred'))){
            return redirect()->route("pages.starred")->with("success", $message);
        }
        else{
            return redirect()->route("home")->with("success", $message);
        }
    }
}


