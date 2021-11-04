<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{

    public function run()
    {
        DB::table('tasks')->insert([
            'title' => Str::random(10),
            'description' => Str::random(110)
        ]);

        Task::factory()
           ->create();

    }
}
