<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(Task::possibleTaskNames()),
            'description' => fake()->randomElement(Task::possibleTaskDescription()),
            'deadline'=> fake()->dateTimeBetween('now','+3 months'),
            'status' => fake()->numberBetween(0,3),
            'priority' => fake()->numberBetween(0,2),
            'project_id'=> fake()->numberBetween(0,100)
        ];
    }
}
