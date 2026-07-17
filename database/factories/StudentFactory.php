<?php

namespace Database\Factories;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birth' => $this->faker->optional()->date('Y-m-d', '-18 years'), 
            'mobile' => $this->faker->phoneNumber(),
            'supervisor_id' => Supervisor::factory(), 
            'user_id' => User::factory(),
        ];
    }
}
