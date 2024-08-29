<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }

    public function run(): void
    {
        User::create([
            'name' => 'super admin',
            'password' => Hash::make('superadminpw'),
            'roles' => 'SUPERADMIN',
            'email' => 'superadmin@gmail.com',
        ]);
        User::create([
            'name' => 'admin',
            'password' => Hash::make('adminpw'),
            'roles' => 'ADMIN',
            'email' => 'admin@gmail.com',
        ]);
        User::create([
            'name' => 'super admin',
            'password' => Hash::make('userpw'),
            'email' => 'user@gmail.com',
        ]);

    }
}
