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
    protected static $possibleTaskNames = [
        "Rédiger un plan d'action",
        'Planifier la réunion avec les collaborateurs',
        'Convoquer Jean Yves',
        "Avancer le développement de l'application",
        "Déployer l'application",
        "Installer Laravel",
        "Utiliser Eloquent",
        "Faire le cahier des charges",
        "Virer Jean Yves"
    ];

    protected static $possibleTaskDescription = [
        "Il faut que nous avançions plus vite",
        'Les collaborateurs à prévenir sont : Jean Mich et Yves',
        'Il faut aussi préparer des arguments pour virer Jean Yves',
        'Il faudrait convoquer l\'équipe la semaine prochaine',
        "L'application doit être terminée la semaine prochaine",
        "Laravel version 1.0.0.0.2",
        "C'est nécessaire de le faire correctement",
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
            'name' => $faker->randomElement(static::$possibleTaskNames),
            'description' => $faker->randomElement(static::$possibleTaskDescription),
            'deadline'=> $faker->dateTimeBetween('now','+3 months'),
            'status' => $faker->numberBetween(0,3),
            'priority' => $faker->numberBetween(0,2),
            'project_id'=> $faker->randomElement(Project::all())->id
        ];
    }
}
