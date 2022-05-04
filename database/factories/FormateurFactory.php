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
                'nom' => "Mbuma",
                'prenom' => "Athom's",
                'sexe' => 'M',
                'phone' => "+243827839232",
                'email' => $this->faker->unique()->safeEmail(),
                'photo' => 'profil.png',
                'pays' => 'RDC',
                'etat' => "interne",
                'biographie' => $this->faker->paragraph,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];
    }
}
