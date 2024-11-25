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

    public function submit(Request $request) {

        
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'issue' => 'required|string|max:1000',
        ]);
    
        // Process the bug report (e.g., save to database, send email)
        // Example: Saving to a database
        ReportBug::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'issue' => $request->input('issue'),
        ]);
    
        // Redirect with success message
        return redirect()->back()->with('success', 'Bug report submitted successfully!');
    }
}