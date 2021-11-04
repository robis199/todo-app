<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(TaskSeeder::class);


        User::factory(3)->create([
            'password' => bcrypt('kawasaki')
        ])->each(function (User $user) {
            Task::factory(12)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
