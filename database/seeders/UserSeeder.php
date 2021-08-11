<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'テストユーザー',
            'email' => 'test@test.test',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->call([
            GroupSeeder::class,
            TaskSeeder::class,
        ]);

        User::factory()
            ->count(3)
            ->has(
                Group::factory()
                    ->has(Task::factory()->count(5))
                    ->count(3)
            )
            ->create();
    }
}
