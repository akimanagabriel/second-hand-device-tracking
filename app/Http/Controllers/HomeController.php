<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Device;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $devices = Device::all()->where("user_id", Auth::user()->id)->count();
        $users = User::all()->count();
        $transfers = Transfer::where("sender", Auth::user()->id)->orWhere("receiver", Auth::user()->id)->count();
        $notifications = Auth::user()->notifications->count();
        return view('home', compact("devices", "users", "transfers", "notifications"));
    }
}
