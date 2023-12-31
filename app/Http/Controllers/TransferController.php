<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Transfer;
use App\Models\User;
use App\Notifications\TransferNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == "admin") {
            $transfers = Transfer::latest()->paginate(4);
        } else {
            $transfers = Transfer::where(function ($query) {
                $user_id = Auth::user()->id;
                $query->where('sender', $user_id)->orWhere('receiver', $user_id);
            })->latest()->paginate(6);
        }

        return view("transfer.transfer", compact("transfers"));
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
            "receiver" => "required|numeric",
            "comment" => "required|string|min:5",
            "device" => "required|numeric"
        ]);

        $request->merge([
            "sender" => Auth::user()->id,
        ]);

        $device = Device::find($request->device);
        $receiver = User::find($request->receiver);
        $sender = User::find(Auth::user()->id);
        // update device owner
        $device->update(["user_id" => $request->receiver]);

        // save a transfer history
        Transfer::create($request->all());

        // Notify a sender
        $notification = "You have transfered ownership of <br> <b>$device->brand $device->name</b> to <b>$receiver->firstname $receiver->lastname </b>";
        $sender->notify(new TransferNotification($notification));

        // Notify a receiver
        $notification = "You have received ownership of <br> <b>$device->brand $device->name</b> from <b>$sender->firstname $sender->lastname </b>";
        $receiver->notify(new TransferNotification($notification));

        // NOTIFY AN ADMIN
        $admins = User::where("type", "admin")->get();
        Notification::send($admins, new TransferNotification("There is a transfer of <b>$device->brand $device->name</b> from <b>$sender->firstname $sender->lastname</b> to <b>$receiver->firstname $receiver->lastname</b>"));

        return redirect()->back()->with("success", "Transfer completed successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transfers = Transfer::where("device", $id)->latest()->paginate(60);

        return view("transfer.show", compact(
            "transfers",
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {
        //
    }

    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
