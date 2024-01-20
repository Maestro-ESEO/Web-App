<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static $password = "Password1+";

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {
        $faker = $this->faker;
        return [
            'first_name' => $faker->firstName(),
            'last_name'=> $faker->lastName(),
            'email' => $faker->unique()->safeEmail(),
            'password' => static::$password,
            'profile_photo_path' => $faker->imageUrl(480, 480, 'people', true)
        ];
    }

}
