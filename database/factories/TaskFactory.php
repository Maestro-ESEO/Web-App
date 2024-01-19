<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected static array $possibleTaskNames = [
        "Rédiger un plan d'action",
        'Planifier la réunion avec les collaborateurs',
        'Convoquer Jean Yves',
        'Virer Camille du projet',
        "Déployer l'application",
        "Installer Laravel"
    ];

    protected static array $possibleTaskDescription = [
        "Il faut que nous avançions plus vite",
        'Les collaborateurs à prévenir sont : Jean Mich et Yves',
        'Il faut aussi préparer des arguments pour virer Jean Yves',
        'Il faudrait la convoquer la semaine prochaine',
        "L'application doit être terminée la semaine prochaine",
        "Laravel version 1.0.0.0.2"
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(static::$possibleTaskNames),
            'description' => fake()->randomElement(static::$possibleTaskDescription),
            'deadline'=> fake()->dateTimeBetween('now','+3 months'),
            'status' => fake()->numberBetween(0,3),
            'priority' => fake()->numberBetween(0,2),
            'project_id'=> Project::all()->random()->id
        ];
    }
}
