<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'firstname' => "admin",
            'lastname' => "admin",
            'email' => "admin@site.com",
            'password' => "1234",
            'phone' => "0781234567",
            'type' => "Admin"
        ]);
    }
}
