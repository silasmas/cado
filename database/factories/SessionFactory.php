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
                'titre' => "Le combat spirituel et le culte",
                'date_debut' => '2022-04-20',
                'date_fin' => '2022-04-21',
                'cover' => "fr.jpg",
                'context' => 'CADO',
                'type' => 'free',
                'spote' => "https://youtu.be/_QFs1KM31-s",
                'prix' => "0",
                'monaie' => "USD",
                'description' => $this->faker->paragraph,
        ];
    }
}
