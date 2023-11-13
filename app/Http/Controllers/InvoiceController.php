<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Notifications\InvoiceNotification;

class InvoiceController extends Controller
{
    public function getAllInvoices()
    {
        $pendingInvoices = Device::where("status", 0)->get();
        return view("invoice.all", compact("pendingInvoices"));
    }
    public function approveInvoice($deviceId)
    {
        $device = Device::find($deviceId);
        $device->update(["status" => 1]);
        User::find($device->user_id)->notify(
            new InvoiceNotification("The invoice of <b> $device->name </b> has been approved successfully!")
        );
        return back()->with("success", "Invoice approved successfully");
    }
}
