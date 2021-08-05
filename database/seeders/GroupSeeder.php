<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'user_id' => 1,
            'name' => '買い物',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('groups')->insert([
            'user_id' => 1,
            'name' => 'Todo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
