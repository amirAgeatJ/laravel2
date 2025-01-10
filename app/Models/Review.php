<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables.
     */
    protected $fillable = [
        'book_id',
        'user_id',
        'rating',
        'content',
    ];

    /**
     * Relation Many-to-One : une review appartient à un livre.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Relation Many-to-One : une review appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
