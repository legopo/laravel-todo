<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;
use App\Models\Task;
use App\Models\Tag;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(3)
            ->has(
                Group::factory()
                    ->has(Task::factory()->count(5))
                    ->count(3)
            )
            ->has(
                Tag::factory()
                    // ->hasAttached(Task::factory()->count(3)) // TODO: 中間テーブルへの保存がわからなかった
                    ->count(3)
            )
            ->create();
    }
}
