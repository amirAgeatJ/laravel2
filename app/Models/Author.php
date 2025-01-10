<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables.
     */
    protected $fillable = [
        'name',
        'nationality',
        'biography',
    ];

    /**
     * Relation One-to-Many : un auteur peut avoir plusieurs livres.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
