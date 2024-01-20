<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        return [
            'name' => ucfirst($faker->word()),
            'description' => $faker->sentence(10, true),
            'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => $faker->dateTimeBetween('now', '+1 year')
        ];
    }
}
