<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Notifications\DueDateNotification;

class NotificationController extends Controller
{
    //============================================
    // Deleting Notifications
    //============================================
    public function deleteNotif($id){
        try {
            //Notify the user
            $user = auth()->user();
            $notification = $user->notifications()->find($id);

            if ($notification) {
                $notification->delete();
                return $this->currentUrl("Notification Deleted Permanently");
            } else {
                return $this->currentUrl("Notification Not Found!");
            }
        } catch (\Exception $e) {
            return $this->currentUrl("Error deleting notification: " . $e->getMessage());
        }
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
