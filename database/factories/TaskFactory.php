<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state([]),
            'title' => $this->faker->text(20),
            'description' => $this->faker->paragraph(255),
            'completed_at' => null
        ];
    }

    protected $model = Task::class;
}
