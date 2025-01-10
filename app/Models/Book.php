<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables.
     */
    protected $fillable = [
        'title',
        'author_id',
        'description',
        'price',
    ];

    /**
     * Relation Many-to-One : un livre appartient à un auteur.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Relation Many-to-Many : un livre peut appartenir à plusieurs catégories.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Relation One-to-Many : un livre peut avoir plusieurs reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
