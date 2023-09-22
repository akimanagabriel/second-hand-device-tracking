<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeviceController;
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
});
