<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Models\UserTask;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        
        $userTask = $faker->randomElement(UserTask::all());

        return [
            "content" => $faker->sentence(10, true),
            "user_id" => $userTask->user_id,
            "task_id" => $userTask->task_id
        ];
    }
}
