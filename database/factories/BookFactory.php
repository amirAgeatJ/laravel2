<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Author;

class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Définir le modèle par défaut.
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->sentence(3),
            'author_id'   => Author::factory(), // Génère un auteur si aucun n'est fourni
            'description' => $this->faker->paragraph(),
            'price'       => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
