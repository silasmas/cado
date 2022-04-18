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
        $i=0;
        return [
            'titre' => "Chapitre ".$this->faker->randomDigit(),
            'sous_titre' => $this->faker->sentence,
            'video' => "https://www.youtube.com/watch?v=RHP88LS-FJs",
            'description' => $this->faker->paragraph,
            'nbrHeure' => $this->faker->randomElement(["00:03:00","00:05:00","00:06:00","00:04:00","00:09:00","00:10:00","00:08:00",]),
            'presentation' => $this->faker->sentence,
            'session_id' => $this->faker->randomElement([1,7,9,10]),
        ];
    }
}
