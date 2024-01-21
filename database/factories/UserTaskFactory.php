<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Task;
use App\Models\UserProject;
use App\Models\UserTask;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTask>
 */
class UserTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;

        $user_id = null;
        $task_id = null;

        while (true) {
            $user_id = $faker->randomElement(User::all())->id;
            $task_id = $faker->randomElement(Task::all())->id;

            if (!UserProject::where("user_id", $user_id)->where("project_id", Task::find($task_id)->project_id)->exists()) {
                continue;
            }

            if (!UserTask::where("user_id", $user_id)->where("task_id", $task_id)->exists()) {
                break;
            }
        }

        return [
            "user_id" => $faker->randomElement(User::all())->id,
            "task_id" => $faker->randomElement(Task::all())->id,
        ];
    }
}
