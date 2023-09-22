<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserCreationController extends Controller
{
    //
    public function createUser(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'firstname' => "required|min:3|string",
            'lastname' => "required|min:3|string",
            'email' => "required|email",
            'password' => "required|min:4",
            'phone' => "required|length:10",
        ]);

        User::create($request->all());
    }
}
