<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@korea.com',  // Email Login Admin
            'password' => Hash::make('password123'), // Password Admin
            'role' => 'admin', // <--- Ini bagian pentingnya
            'email_verified_at' => now(), 
        ]);
    }
}