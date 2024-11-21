<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Trash;
use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dotenv\Exception\ValidationException;
use App\Notifications\DueDateNotification;

// Description: 
// Main Controller for the Task Model
class TaskController extends Controller
{
    /*
         ==========================================================
        ||                        MAIN CRUD                      ||
        ==========================================================
        
        Description: 
        The Section for the common CRUD Functions
    */
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
        return redirect("/home")->with("added", "New Task Added");

    }
    //============================================
    // Updating feature
    //============================================
    public function editTask(Request $request, Task $task) {
        try {
            // Validate the input, including the priority_id
            $request->validate([
                "taskname" => "required|max:255",
                "description" => "nullable|max:255",
                "priority_id" => "nullable|in:,1,2,3",
                "category_id" => "nullable|in:,1,2,3",
                "due_date" => "nullable|date|after_or_equal: today",
            ]);

            // Prepare the data for update
            $data = $request->only(['taskname', 'description', "priority_id", "category_id", "due_date"]);

            // If priority_id is an empty string, set it to null, THIS means the first option with no value in select box
            if ($data['priority_id'] === "") {
                $data['priority_id'] = null;
            }
            // If category_id is an empty string, set it to null, THIS means the first option with no value in select box
            if ($data['category_id'] === "") {
                $data['category_id'] = null;
            }

            // Update the task with validated input
            $task->update($data);

            //Notify the user
            $user = auth()->user();
            $user->notify(new DueDateNotification($task));
            

            // Call the currentUrl function with a custom message.
            return $this->currentUrl("Task Updated");

        } catch (ValidationException $error) {
            // Handle validation errors
            return redirect()->route('home')->withErrors($error->errors())->withInput();
        }
    }

    //============================================
    // Deleting Feature Soft Delete and Deliver to Trash
    //============================================
    public function deleteTask($id){
        $task = Task::findOrFail($id);

        Trash::create([
            "task_id" => $task->id,
            "taskname" => $task->taskname,
            "description"=> $task->description,
            "user_id" => $task->user_id,
            "deleted_at" => now(),
        ]);

        $task->delete();

        return $this->currentUrl("Task moved to Trash");

    }


    /*
         ==========================================================
        ||                  ADDITIONAL FEATURES                  ||
        ==========================================================
        
        Description: 
        The Section for the Additional Features in our Web Application
    */
    //============================================
    // Toggling as Complete
    //============================================
    public function toggleComplete($id){
        $task = Task::findOrFail($id);
        //Toggle the "is_completed" status
        $task->is_completed = !$task->is_completed;
        $task->save();
        
        return redirect()->back()->with('success', 'Task Status updated!');
    }


    //============================================
    // Mark Task as Favorite
    //============================================
    
    public function markAsFavorite($id){
        $task = Task::findOrFail($id);
        $task->is_favorite = !$task->is_favorite;
        $task->save();

        // Call the currentUrl function with a custom message.
        return $this->currentUrl("Task Marked Updated");
    }

    //============================================
    // Restore Task
    //============================================
    public function restoreTask($id){
        // Find the item in the Trash table by its ID
        $trashEntry = Trash::findOrFail($id);
    
        // Use the task_id to find the soft-deleted Task entry in the tasks table
        $task = Task::withTrashed()->findOrFail($trashEntry->task_id);
        // Restore the Task
        $task->restore();
        // Delete the entry from Trash, as it's no longer needed there
        $trashEntry->delete();
    
        return $this->currentUrl("Task Restored");
    }
    //============================================
    // Hard Delete Task
    //============================================
    public function hardDelete($id) {
        // Retrieve the Trash entry and corresponding soft-deleted Task entry
        $trashEntry = Trash::findOrFail($id);
        $task = Task::withTrashed()->findOrFail($trashEntry->task_id);
    
        // Permanently delete both the Task and the Trash entry
        $task->forceDelete();
        $trashEntry->delete();
    
        return $this->currentUrl("Task Deleted Permanently");
    }

    //============================================
    // Search Function
    //============================================
    public function search(Request $request, $context)
    {
        $search = trim($request->input('search')); // Remove extra spaces
        
        // Start with a base query
        $query = Task::query();

        // Apply context-specific filters
        if($context == 'pages.starred'){
            $query->where('is_favorite', 1);
        }
        else if($context == 'pages.trash'){
            $query->onlyTrashed();
        }
        // Perform the query based on whether a search term is provided
        if (!empty($search)) {
            $query->where('taskname', 'like', "%$search%");
        } 

        // Execute the query
        $tasks = $query->get();

        // Return the view with filtered tasks
        return view($context, ['tasks' => $tasks]);
    }

    
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
        $tasks = Task::where('user_id', auth()->id())->get();
        
        // Pass the retrieved tasks to the 'home' view for rendering
        // The 'compact('tasks')' creates an array with the 'tasks' variable for the view
        return view('home', compact('tasks'));
       
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
    // Deleted Task Display
    //============================================
    public function trashIndex(){
        // Retrieve all tasks associated with the currently authenticated user
        // The `auth()->id()` method gets the ID of the logged-in user
        $tasks = Trash::where('user_id', auth()->id())->get();
        
        // Pass the retrieved tasks to the 'starred' view for rendering
        // The 'compact('tasks')' creates an array with the 'tasks' variable for the view
        return view('pages.trash', compact('tasks'));
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
        elseif(str_contains(url()->previous(), route('pages.trash'))){
            return redirect()->route("pages.trash")->with("success", $message);
        }
        else{
            return redirect()->route("home")->with("success", $message);
        }
    }
}


