<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{

    public function run()
    {
        User::factory(5)->create([
            'password' => bcrypt('robis')
        ])
            ->each(function (User $user)
            {
            Task::factory(50)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
