<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use App\Models\UserProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::all()->where('email', 'john.doe@maestro.com')->first();
        $projects = Project::all()->random(3);
        foreach ($projects as $project) {
            UserProject::create([
                "user_id" => $user->id,
                "project_id" => $project->id,
                "is_admin" => true
            ]);
        }
        UserProject::factory()->count(30)->create();
    }
}
