<?php

namespace Database\Factories;

use App\Models\Procedure;
use App\Models\Receptionist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
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
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'birth' => $this->faker->date('Y-m-d', '-10 years'),
            'diabetes' => $this->faker->boolean(20), 
            'gender' => $this->faker->randomElement(['male', 'female']),
            'Blood_type' => $this->faker->randomElement(['A', 'B', 'O', 'AB']),
            'procedure_id' => Procedure::first()->id,
            'receptionist_id' => Receptionist::factory(),
        ];
    }
}
