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
    public function readUsers()
{
    $users = User::all(); // Retrieve all users from the database
    return view('readUsers', ['users' => $users]);
}

public function editUser($id)
{
    $user = User::find($id); // Retrieve the user by ID
    return view('editUser', ['user' => $user]);
}
public function updateUser(Request $request, $id)
{
    $user = User::find($id); // Retrieve the user by ID

    // Validate the form data
    $request->validate([
        'uname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        // Add other validation rules as needed
    ]);

    // Update the user data
    $user->name = $request->input('uname');
    $user->email = $request->input('email');
    // Update other user fields as needed

    // Save the updated user to the database
    $user->save();

    // Redirect the user to the readUsers page or any other page
    return redirect()->route('readUsers')->with('status', 'User updated successfully!');
}
Public function deleteUser($id)
{
    $user = User::find($id); // Retrieve the user by ID

    // Check if the user exists
    if (!$user) {
        return redirect()->route('readUsers')->with('error', 'User not found!');
    }

    // Delete the user
    $user->delete();

    // Redirect the user to the readUsers page or any other page
    return redirect()->route('readUsers')->with('status', 'User deleted successfully!');
}
 }
