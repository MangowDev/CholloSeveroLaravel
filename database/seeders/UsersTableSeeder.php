<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => "admin",
            "password" => Hash::make("admin"), 
            "email" => "admin@example.com",
            "role" => "admin"
        ]);

        DB::table('users')->insert([
            "name" => "mango",
            "password" => Hash::make("1234"), 
            "email" => "mango@gmail.com",
            "role" => "user"
        ]);
    }
}
