<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? \App\Models\User::factory()->create()->id,
            'description' => $this->faker->sentence,
            'fee' => $this->faker->randomFloat(2, 100, 10000), // Random bedrag
        ];
    }
}

