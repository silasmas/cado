<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\formateur>
 */
class FormateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'nom' => "Olondo",
                'prenom' => "Shilo",
                'sexe' => 'M',
                'phone' => "+2430827839232",
                'email' => $this->faker->unique()->safeEmail(),
                'photo' => 'shilo.jpg',
                'pays' => 'RDC',
                'etat' => "interne",
                'biographie' => $this->faker->paragraph,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];
    }
}
