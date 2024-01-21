<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Project;
use App\Models\UserProject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProject>
 */
class UserProjectFactory extends Factory
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
        $project_id = null;

        while (true) {
            $user_id = $faker->randomElement(User::all())->id;
            $project_id = $faker->randomElement(Project::all())->id;

            if (!UserProject::where("user_id", $user_id)->where("project_id", $project_id)->exists()) {
                break;
            }
        }

        return [
            "user_id" => $user_id,
            "project_id" => $project_id,
            "is_admin" => $faker->boolean(50),
        ];
    }
}
