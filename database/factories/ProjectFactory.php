<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected static $possibleProjectName = [
        "PFE",
        'Aventuriers du rail',
        'Falling Blox',
        'Projet InfraLog',
        "Etude de marché",
        "Projet A",
        "Maestro App",
        "Stage",
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        
        return [
            'name' => $faker->randomElement(static::$possibleProjectName),
            'description' => $faker->sentence(10, true),
            'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => $faker->dateTimeBetween('now', '+1 year')
        ];
    }
}
