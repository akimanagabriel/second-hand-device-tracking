<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devices = Device::where("user_id", Auth::user()->id)->where("status", "!=", 0)->orderBy("name")->get();
        $issues = Issue::where("user", Auth::user()->id)->paginate(5);
        return view("issues.mine", compact("devices", "issues"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "device" => "required|numeric",
            "issue" => "required|string"
        ]);

        $request->merge(["user" => Auth::user()->id]);
        Issue::create($request->all());
        // set device to inactive state
        Device::find($request->device)->update(["status" => 0]);
        return redirect()->back()->with("success", "Issue commited !");
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
