<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'department_id' => 1, // Assuming Engineering
            'hire_date' => '2020-01-01',
            'locale' => 'en',
        ]);

        // Employee User
        User::create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => Hash::make('password'),
            'role' => 'employee',
            'department_id' => 1, // Assuming Engineering
            'hire_date' => '2022-06-15',
            'locale' => 'en',
        ]);
    }
}
