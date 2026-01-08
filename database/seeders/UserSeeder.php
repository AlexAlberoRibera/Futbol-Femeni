<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'alex',
            'email' => 'alberoriberaalex@gmail.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_ADMIN,
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_MANAGER,
        ]);

        User::create([
            'name' => 'Arbitro',
            'email' => 'arbitro@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_ARBITRE,
        ]);
    }
}
