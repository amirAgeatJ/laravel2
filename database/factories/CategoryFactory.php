<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Définir le modèle par défaut.
     */
    public function definition()
    {
        return [
            'name'        => ucfirst($this->faker->unique()->word()),
            'description' => $this->faker->sentence(6),
        ];
    }
}
