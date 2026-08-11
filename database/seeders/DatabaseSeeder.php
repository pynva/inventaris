<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Utama
        User::create([
            'name' => 'Admin Suralaya',
            'email' => 'admin1@pltu.com',
            'password' => Hash::make('admin123'),
        ]);

        // Admin SIS
        User::create([
            'name' => 'Admin SIS',
            'email' => 'admin2@pltu.com',
            'password' => Hash::make('sis123'),
        ]);

    }
}