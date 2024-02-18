<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        //
        DB::table('users')->insert([
            ['role_id' => '1', 'user_name' => 'admin1', 'user_ic' => '11111', 'user_age' => '11111', 'user_address' => '11111', 'user_hp' => '11111', 'email' => 'admin1@gmail.com', 'password' => Hash::make('11111'), 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => '1', 'user_name' => 'admin2', 'user_ic' => '2', 'user_age' => '22222', 'user_address' => '22222', 'user_hp' => '22222', 'email' => 'admin2@gmail.com', 'password' => Hash::make('22222'), 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => '1', 'user_name' => 'admin3', 'user_ic' => '3', 'user_age' => '33333', 'user_address' => '33333', 'user_hp' => '33333', 'email' => 'admin3@gmail.com', 'password' => Hash::make('33333'), 'created_at' => $now, 'updated_at' => $now],
            
            ['role_id' => '2', 'user_name' => 'student1', 'user_ic' => '11111', 'user_age' => '11111', 'user_address' => '11111', 'user_hp' => '11111', 'email' => 'student1@gmail.com', 'password' => Hash::make('11111'), 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => '2', 'user_name' => 'student2', 'user_ic' => '22222', 'user_age' => '22222', 'user_address' => '22222', 'user_hp' => '22222', 'email' => 'student2@gmail.com', 'password' => Hash::make('22222'), 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => '2', 'user_name' => 'student3', 'user_ic' => '33333', 'user_age' => '33333', 'user_address' => '33333', 'user_hp' => '33333', 'email' => 'student3@gmail.com', 'password' => Hash::make('33333'), 'created_at' => $now, 'updated_at' => $now],
            
            ['role_id' => '3', 'user_name' => 'teacher1', 'user_ic' => '11111', 'user_age' => '11111', 'user_address' => '11111', 'user_hp' => '11111', 'email' => 'teacher1@gmail.com', 'password' => Hash::make('11111'), 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => '3', 'user_name' => 'teacher2', 'user_ic' => '22222', 'user_age' => '22222', 'user_address' => '22222', 'user_hp' => '22222', 'email' => 'teacher2@gmail.com', 'password' => Hash::make('22222'), 'created_at' => $now, 'updated_at' => $now],
            ['role_id' => '3', 'user_name' => 'teacher3', 'user_ic' => '33333', 'user_age' => '33333', 'user_address' => '33333', 'user_hp' => '33333', 'email' => 'teacher3@gmail.com', 'password' => Hash::make('33333'), 'created_at' => $now, 'updated_at' => $now],

        ]);
    }
}