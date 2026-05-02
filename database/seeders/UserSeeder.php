<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);
        
        User::create([
            'name' => 'Moderator',
            'email' => 'mod@test.com',
            'password' => bcrypt('password'),
            'role' => 'moderator'
        ]);
    }
}
