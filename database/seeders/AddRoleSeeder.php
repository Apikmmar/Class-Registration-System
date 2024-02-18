<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        //
        DB::table('add__roles')->insert([
            ['addrole_name' => 'Class Teacher', 'addrole_desc' => "Manage the class, provides instruction, oversees student's academic progress, and creates a positive learning environment.", 'created_at' => $now, 'updated_at' => $now],
            ['addrole_name' => 'Representative', 'addrole_desc' => "Spokesperson and leader, represents the class in meetings, and organizes events.", 'created_at' => $now, 'updated_at' => $now],
            ['addrole_name' => 'Vice Representative', 'addrole_desc' => "Assists the class representative and may assume their duties in their absence.", 'created_at' => $now, 'updated_at' => $now],
            ['addrole_name' => 'Secretary', 'addrole_desc' => "Manages records, takes notes during meetings, and facilitates communication within the class.", 'created_at' => $now, 'updated_at' => $now],
            ['addrole_name' => 'Treasurer', 'addrole_desc' => "Handles class finances, budgeting, and keeps records of expenses and income.", 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
