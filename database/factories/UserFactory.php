<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'location_id' => \App\Models\Location::inRandomOrder()->first()->id ?? null,
            'role_id' => \App\Models\Role::inRandomOrder()->first()->id ?? null,
            'password' => Hash::make('password'), // Default wachtwoord
        ];
    }
}
