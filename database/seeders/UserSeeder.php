<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'role' => 'admin',
                'password' => config('app.default_password')
            ]
        ];

        foreach($users as $user){
            User::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'role' => $user['role'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
