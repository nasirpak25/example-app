<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use App\Models\User; // Add this line at the beginning of the file

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser()
    {
        return view('createUser');
    }
    public function postCreateUser(Request $request)
    {
        // Validate the form data
        $request->validate([
            'uname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'psw' => 'required|string|min:6',
        ]);

        // Create a new user instance
        $user = new User();
        $user->name = $request->input('uname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('psw'));
        // You might need to set other fields depending on your User model

        // Save the user to the database
        $user->save();

        // Redirect the user to the home page or any other page
        return redirect('/home')->with('status', 'User registered successfully!');
    }
}
