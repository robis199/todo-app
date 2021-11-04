<?php

namespace Database\Factories;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition()
    {
        return [
           'title'=>$this->faker->text(20),
           'description'=>$this->faker->paragraph(255),
            'completed_at' => null
        ];
    }

    protected $model = Task::class;
}
