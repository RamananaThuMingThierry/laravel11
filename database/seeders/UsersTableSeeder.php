<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
                'address' => 'VT 29 RAI bis Ampahateza',
                'phone' => '0327563770',
                'status' => 'active'
            ],
            // agent
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('123456789'),
                'phone' => '0329790536',
                'address' => 'VT 29 RAI bis Ampahateza',
                'role' => 'agent',
                'status' => 'active'
            ],
            // user
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456789'),
                'address' => 'VT 29 RAI bis Ampahateza',
                'role' => 'user',
                'phone' => '0327339964',
                'status' => 'active'
            ],
        ]);

    }
}
