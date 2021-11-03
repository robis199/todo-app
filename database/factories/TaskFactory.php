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
           'description'=>$this->faker->text(255),
        ];
    }

    protected $model = Task::class;
}
