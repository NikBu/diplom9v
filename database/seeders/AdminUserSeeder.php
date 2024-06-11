<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create the first admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('administrator'),
            'phone_number' => '0', // Add phone number if needed
            'role' => 'admin', // Assign the 'admin' role directly in the seeder
        ]);
    }
}