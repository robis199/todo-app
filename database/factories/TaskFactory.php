<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => null,
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(25),
            'completed_at' => null,
            'created_at' => $this->faker->date,
            'updated_at' => $this->faker->date,
        ];
    }
}
