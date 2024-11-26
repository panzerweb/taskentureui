<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Badge;
use App\Models\Trash;
use App\Models\Avatar;
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
                "description" => "nullable|string",
                "priority_id" => "nullable|in:,1,2,3",
                "category_id" => "nullable|in:,1,2,3",
                "due_date" => "nullable|date|after_or_equal: today",
            ]);

            // Old Taskname to retrieve
            $oldTaskName = $task->taskname;

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
            $user->notify(new DueDateNotification($task, $oldTaskName));
            

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
        $user = auth()->user();
        //Toggle the "is_completed" status
        $task->is_completed = !$task->is_completed;
        $task->save();

        // Add XP if task is marked completed
        if ($task->is_completed) {
            $user->xp += 10; // Adjust XP points as needed
            $user->save();
            $this->checkLevelUp($user);
            session()->flash('toggle', '+10 xp');
        }
        else if(!$task->is_completed){
            $user->xp -= 10; // Adjust XP points as needed
            $user->save();
            $this->checkLevelUp($user);
            session()->flash('toggle', '-10 xp');
        }
        
        return redirect()->back();
    }

    protected function checkLevelUp($user)
    {
        $requiredXp = $user->level * 30; // Example: XP required for next level

        if ($user->xp >= $requiredXp) {
            $user->xp -= $requiredXp; // Carryover XP
            $user->level++;


            // Save user updates before assigning a badge
            $user->save();

            // Assign Badge for the new level (if applicable)
            $badge = Badge::where('required_xp', '<=', $requiredXp) // Match the badge for the level
                ->latest('required_xp')
                ->first();

            if ($badge && !$user->badges->contains($badge->id)) {
                $user->badges()->attach($badge->id);
            }
            // Assign Avatar for the new level
            $avatar = Avatar::where('level' , $user->level)->first();
            if ($avatar && !$user->avatars->contains($avatar->id)) {
                $user->avatars()->attach($avatar->id); // Store in `user_avatar` table
                $user->avatar = $avatar->image; // Update the current avatar path
                $user->save();
            }
            
            session()->flash('level_up', 'Congratulations! You have leveled up to Level ' . $user->level . '!');

        }
        // Check for Rank-Down
        while ($user->xp < 0 && $user->level > 1) {
            $user->level--; // Rank down
            $user->xp += ($user->level * 30); // Add the required XP for the previous level

            // Remove the Avatar for the current level
            $currentAvatar = Avatar::where('level', $user->level + 1)->first();
            if ($currentAvatar) {
                $user->avatars()->detach($currentAvatar->id);
            }

            // Update the avatar to the previous level
            $previousAvatar = Avatar::where('level', $user->level)->first();
            if ($previousAvatar) {
                $user->avatar = $previousAvatar->image;
            }

            // Remove the Badge for the current level
            $currentBadge = Badge::where('required_xp', '<=', $requiredXp)->latest('required_xp')->first();
            if ($currentBadge) {
                $user->badges()->detach($currentBadge->id);
            }

            // Save updated level and avatar
            $user->save();

            session()->flash('level_down', 'You have ranked down to Level ' . $user->level . '.');
        }
        
        if ($user->level === 1 && is_null($user->avatar)) {
            // Special case for new Level 1 users without an avatar
            $levelOneAvatar = Avatar::where('level', 1)->first();
            if ($levelOneAvatar) {
                $user->avatars()->attach($levelOneAvatar->id);
                $user->avatar = $levelOneAvatar->image;
                $user->save();
            }
        }
        

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
        $tasks = $query->paginate(5);
        // Fetch the badges in order to avoid error (This badges are unaffected by search)
        $badges = Badge::all();

        // Return the view with filtered tasks
        return view($context, ['tasks' => $tasks, 'badges' => $badges]);
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


