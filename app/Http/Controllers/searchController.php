<?php

namespace App\Http\Controllers;

use App\Models\Device;

use Illuminate\Http\Request;

class searchController extends Controller
{
    public function searchDevice(Request $request)
    {
        $devices = Device::where("sn", "like", "%$request->serialNumber%")->get();

        return view("search.showResults", compact(
            "devices"
        ));
    }
}
