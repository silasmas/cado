<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\formationFormateur>
 */
class FormateurSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'formateur_id' => $this->faker->randomElement([1,2]),
            'session_id' => $this->faker->randomElement([6,7,8,9]),
        ]; 
    }
}
