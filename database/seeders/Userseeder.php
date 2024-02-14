<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert(
            [
                [
                    'name' => 'admin1',
                    'username' => 'admin1',
                    'email' => 'admin1@gmail.com',
                    'role' => 'admin',
                    'status' => 'active',
                    'password' => bcrypt('Son12345')
                ],
                [
                    'name' => 'vendor1',
                    'username' => 'vendor1',
                    'email' => 'vendor1@gmail.com',
                    'role' => 'vendor',
                    'status' => 'active',
                    'password' => bcrypt('Son12345')
                ],
                [
                    'name' => 'user1',
                    'username' => 'user1',
                    'email' => 'user1@gmail.com',
                    'role' => 'user',
                    'status' => 'active',
                    'password' => bcrypt('Son12345')
                ]
            ]
        );
    }
}
