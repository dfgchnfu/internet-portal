<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@portal.ru',
                'password' => bcrypt('123456'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ivan Ivanov',
                'email' => 'ivan@portal.ru',
                'password' => bcrypt('123456'),
                'role' => 'owner',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Portal Visitor',
                'email' => 'visitor@portal.ru',
                'password' => bcrypt('123456'),
                'role' => 'visitor',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
