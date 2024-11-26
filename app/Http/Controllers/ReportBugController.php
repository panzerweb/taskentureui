<?php

namespace App\Http\Controllers;

use App\Models\ReportBug; 
use Illuminate\Http\Request;

class ReportBugController extends Controller
{
    public function show()
    {
        return view('pages.ReportBug'); 
    }

    public function submit(Request $request) 
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'issue' => 'required|string|max:1000',
        ]);

        // Save the bug report to the database
        ReportBug::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'issue' => $request->input('issue'),
        ]);

        // Redirect with success message in the session
        return redirect()->route('pages.ReportBug')->with('success', 'Bug report submitted successfully!');
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
        elseif(str_contains(url()->previous(), route('pages.ReportBug'))){
            return redirect()->route("pages.ReportBug")->with("success", $message);
        }
        else{
            return redirect()->route("home")->with("success", $message);
        }
    }
}