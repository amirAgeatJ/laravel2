<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer des utilisateurs (si ce n'est pas déjà fait)
        User::factory(10)->create();

        // Créer des auteurs
        Author::factory(10)->create();

        // Créer des catégories
        Category::factory(5)->create();

        // Créer des livres et les associer à des auteurs et catégories
        Book::factory(20)->create()->each(function ($book) {
            // Associer 1 à 3 catégories aléatoires
            $book->categories()->attach(
                Category::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Créer des reviews
        Review::factory(50)->create();
    }
}
