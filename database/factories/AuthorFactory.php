<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    /**
     * Définir le modèle par défaut.
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->name(),
            'nationality' => $this->faker->country(),
            'biography'   => $this->faker->paragraph(3),
        ];
    }
}
