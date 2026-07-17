<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReceptionistFactory extends Factory
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
            'office_number' => 'Office ' . $this->faker->numberBetween(101, 505),
            'location' => 'Building ' . $this->faker->randomElement(['A', 'B', 'C']) . ', Floor ' . $this->faker->numberBetween(1, 3),
            'user_id' => User::factory(),
        ];
    }
}
