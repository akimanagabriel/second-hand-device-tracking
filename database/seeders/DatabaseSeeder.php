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
            'firstname' => "RUTH",
            'lastname' => "Admin",
            'email' => "me@site.com",
            'password' => "1234",
            'phone' => "0781234567",
            'type' => "admin",
            'nid' => "1111111111111111"
        ]);
    }
}
