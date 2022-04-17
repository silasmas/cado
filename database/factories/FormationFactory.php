<?php

namespace Database\Factories;

use App\Models\formation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\formation>
 */
class FormationFactory extends Factory
{

    protected $formation= formation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence,
            'sous_titre' => $this->faker->sentence,
            'video' => "https://youtu.be/_QFs1KM31-s",
            'description' => $this->faker->paragraph,
            'cover' => "default.jpg",
            'presentation' => $this->faker->sentence,
            'session_id' => 1,
        ];
    }
}
