<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supervisor>
 */
class SupervisorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

    
        return [
            'address' => $this->faker->address(),
            'specialty' => $this->faker->randomElement(['Endodontics', 'Orthodontics', 'Pedodontics', 'Periodontics']),
            'university_degree' => $this->faker->randomElement(['Bachelor', 'master', 'Phd', 'prof']),
            'user_id' => User::factory(), 
        ];
    }
        
    
}
