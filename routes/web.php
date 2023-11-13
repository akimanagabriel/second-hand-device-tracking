<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserCreationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware("guest")->group(function () {
    Route::view('/', 'auth.login');
    // authentication
    Route::post('/createUser', [UserCreationController::class, 'createUser'])->name("createUser");
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // users
    Route::get('/users', [UserCreationController::class, 'allUsers'])->name("users.list");
    Route::post('/addUserByAdmin', [UserCreationController::class, 'newUserByAdmin'])->name("users.add");

    // categories
    Route::resource("/category", CategoryController::class)->names("category");

    // devices
    Route::resource('/device', DeviceController::class);
    Route::get("change-device-status/{id}", [DeviceController::class, "changeStatus"])->name("statuser");

    // transfer
    Route::resource("/transfer", TransferController::class);
    Route::get("/device{id}transfer", [TransferController::class, "show"])->name("showSingleTransfer");

    // notification
    Route::get("/readall", [TransferController::class, "markAsRead"])->name("readAllNotification");
    Route::view("/notifications", "notification.all")->name("notifications");

    // cases routes
    Route::resource("/issues", IssueController::class);

    // search routes
    Route::get("/search", [searchController::class, "searchDevice"])->name("search");

    // invoices
    Route::get("/invoices_indexing", [InvoiceController::class, "getAllInvoices"])->name("invoice.all");
    Route::get("/approve_invoice/{device_id}", [InvoiceController::class, "approveInvoice"])->name("invoice.approve");
    Route::get("/reject_invoice/{device_id}", [InvoiceController::class, "rejectInvoice"])->name("invoice.reject");
});
