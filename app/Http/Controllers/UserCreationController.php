<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserCreationController extends Controller
{
    //
    public function createUser(Request $request)
    {
        $request->validate([
            'firstname' => "required|min:3|string",
            'lastname' => "required|min:3|string",
            'email' => "required|email|unique:users", // Corrected 'email' validation rule
            'password' => "required|min:4",
            'phone' => "required|size:10|unique:users",
        ]);

        User::create($request->all());
        return redirect()->route('login')->with('success', "User registered");
    }
    //
    public function newUserByAdmin(Request $request)
    {
        $request->validate([
            'firstname' => "required|min:3|string",
            'lastname' => "required|min:3|string",
            'email' => "required|email|unique:users", // Corrected 'email' validation rule
            'password' => "required|min:4",
            'phone' => "required|size:10|unique:users",
        ]);

        User::create($request->all());
        return redirect()->back()->with('success', "User Created");
    }
    //
    public function allUsers()
    {
        $users = User::latest()->paginate(7);
        return view('users.list', compact('users'));
    }
}
