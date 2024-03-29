<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "john.doe@maestro.com",
            "password" => "Password1+",
            "profile_photo_path" => "https://img.freepik.com/vecteurs-premium/illustration-conception-logo-icone-agent-secret_586739-409.jpg"
        ]);
        User::factory()->count(50)->create();
    }
}
