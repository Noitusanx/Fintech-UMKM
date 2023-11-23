<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => env('ADMIN_USERNAME', 'default_username'),
            'email' => env('ADMIN_EMAIL', 'default_email@example.com'),
            'is_admin' => env('ADMIN_IS_ADMIN', 0),
            'password' => env('ADMIN_PASSWORD', 'default_password'),
        ]);
    }
}

