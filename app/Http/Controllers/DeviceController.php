<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Device;
use App\Models\User;
use App\Notifications\RegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy("name")->get();
        $persons = User::orderBy("Firstname")->get();
        $devices = Device::latest()->where("user_id", Auth::user()->id)->get();
        return view("device.index", compact("devices", "categories", "persons"));
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
            "name" => "required|min:4|string",
            "sn" => "required|min:4|string",
            "category" => "required|string",
            "brand" => "required|string",
            "invoiceFile" => "required|file",
        ]);

        $request->merge([
            "user_id" => Auth::user()->id,
            "status" => 0,
        ]);

        if ($request->hasFile("invoiceFile")) {
            $file = $request->file("invoiceFile");
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move("invoices/", $filename);
            $request->merge(["invoice" => $filename]);
            // dd($request->all());
            Device::create($request->all());
            $request->user()->notify(new RegisterNotification($request->name));
            return redirect()->back()->with("success", "Device registered!");
        } else {
            return redirect()->back()->with("error", "failed to register a device!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        //
    }

    public function changeStatus($id)
    {
        $device = Device::find(decrypt($id));
        $status = !$device->status;
        $device->update(["status" => $status]);
        return redirect()->back()->with("success", "Status changes!");
    }
}
