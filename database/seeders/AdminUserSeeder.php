<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => (string) \Illuminate\Support\Str::uuid(), // UUID for ID
            'name' => 'Admin User', 
            'username' => 'admin',
            'email' => 'admin@gresham.world',
            'email_verified' => 1,
            'password' => Hash::make('y26?1nz7eRiW'), // Secure password
            'user_type' => 1, // 1: Super Admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
