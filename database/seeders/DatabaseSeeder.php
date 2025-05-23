<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email = 'superadmin@gmail.com';
        $password = bcrypt('1234');
        User::create([
            'name' => 'Super Admin',
            'role' => 0,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
