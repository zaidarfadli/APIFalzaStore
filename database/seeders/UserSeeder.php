<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'zaidar',
                'email' => 'zaidar@gmail.com',
                'username' => 'zaidar',
                'slug' => 'zaidar',
                'role' => 'admin',
                'password' => '123'


            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
