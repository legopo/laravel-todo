<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'group_id' => 1,
            'name' => 'タスク1',
            'detail' => 'タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細',
            'due_date' => '2021-12-03',
            'is_important' => 1,
            'is_completed' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tasks')->insert([
            'group_id' => 1,
            'name' => 'タスク2',
            'detail' => 'タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細',
            'due_date' => '2021-07-03',
            'is_important' => 0,
            'is_completed' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tasks')->insert([
            'group_id' => 2,
            'name' => 'タスク3',
            'detail' => 'タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細',
            'due_date' => '2021-12-03',
            'is_important' => 1,
            'is_completed' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tasks')->insert([
            'group_id' => 2,
            'name' => 'タスク4',
            'detail' => 'タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細タスク詳細',
            'is_important' => 1,
            'is_completed' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
