<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relation Many-to-Many : une catégorie peut avoir plusieurs livres,
     * et un livre peut appartenir à plusieurs catégories
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
