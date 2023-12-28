<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'deadline',
        'status',
        'priority',
        'project_id'
    ];

    public static function possibleTaskNames()
    {
        return [
            "Rédiger un plan d'action",
            'Planifier la réunion avec les collaborateurs',
            'Convoquer Jean Yves',
            'Virer Camille du projet',
            "Déployer l'application",
            "Installer Laravel"
        ];
    }

    public static function possibleTaskDescription()
    {
        return [
            "Il faut que nous avançions plus vite",
            'Les collaborateurs à prévenir sont : Jean Mich et Yves',
            'Il faut aussi préparer des arguments pour virer Jean Yves',
            'Il faudrait la convoquer la semaine prochaine',
            "L'application doit être terminée la semaine prochaine",
            "Laravel version 1.0.0.0.2"
        ];
    }
}
