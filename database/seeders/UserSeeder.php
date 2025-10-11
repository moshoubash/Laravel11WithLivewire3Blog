<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('1'),
            'is_admin' => false
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1'),
            'is_admin' => true
        ]);
    }
}
