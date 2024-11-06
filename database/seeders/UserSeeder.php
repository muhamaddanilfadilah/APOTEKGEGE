<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminapotek'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Kasir',
            'email' => 'fadel@gmail.com',
            'password' => Hash::make('adminapotek'),
            'role' => 'kasir',
        ]);
    }
}
