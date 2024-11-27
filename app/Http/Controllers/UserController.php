<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Dotenv\Exception\ValidationException;

class UserController extends Controller
{
    public function editUser(Request $request, User $user) {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);
    
        $user->update([
                'name' => $request->name,
                'bio' => $request->bio,
                ]);
    
        return redirect()->route('home')->with('success', 'Profile updated successfully!');
    }
    
}
