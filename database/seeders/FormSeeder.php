<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        //
        DB::table('forms')->insert([
            ['form_number' => '1', 'form_class' => '5', 'created_at' => $now, 'updated_at' => $now],
            ['form_number' => '2', 'form_class' => '5', 'created_at' => $now, 'updated_at' => $now],
            ['form_number' => '3', 'form_class' => '5', 'created_at' => $now, 'updated_at' => $now],
            ['form_number' => '4', 'form_class' => '5', 'created_at' => $now, 'updated_at' => $now],
            ['form_number' => '5', 'form_class' => '5', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
