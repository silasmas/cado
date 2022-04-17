<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\session>
 */
class SessionFactory extends Factory
{

    protected $session= Session::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'titre' => $this->faker->sentence,
                'date_debut' => $this->faker->date,
                'date_fin' => '2022-05-10',
                'cover' => "default.jpg",
                'context' => 'CADO',
                'type' => 'free',
                'spote' => "https://youtu.be/_QFs1KM31-s",
                'prix' => "0",
                'monaie' => "USD",
                'description' => $this->faker->paragraph,
        ];
    }
}
