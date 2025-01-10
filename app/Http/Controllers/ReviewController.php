<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Enregistre une nouvelle review en base.
     */
    public function store(Request $request, $bookId)
    {
        // Validation des données
        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        // Récupérer le livre
        $book = Book::findOrFail($bookId);

        // Créer la review
        Review::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'rating'  => $request->rating,
            'content' => $request->content,
        ]);

        return redirect()->route('books.show', $book->id)
                         ->with('success', 'Votre avis a été posté avec succès !');
    }
}
