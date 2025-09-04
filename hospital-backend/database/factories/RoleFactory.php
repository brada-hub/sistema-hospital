<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombrerol' => $this->faker->word(), // Un nombre aleatorio para el rol
            'descripcionrol' => $this->faker->sentence(), // Una descripción aleatoria para el rol
        ];
    }
}
