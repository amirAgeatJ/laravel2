<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
use App\Models\Book;
use App\Models\User;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    /**
     * Définir le modèle par défaut.
     */
    public function definition()
    {
        return [
            'book_id' => Book::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'rating'  => $this->faker->numberBetween(1, 5),
            'content' => $this->faker->paragraph(3),
        ];
    }
}
