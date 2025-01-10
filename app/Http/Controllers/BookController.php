<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Liste tous les livres (R de CRUD).
     */
    public function index()
    {
        // Charger l'auteur et les catégories pour chaque livre
        $books = Book::with(['author', 'categories'])->get();

        return view('books.index', compact('books'));
    }

    /**
     * Affiche le formulaire de création d'un livre (C de CRUD).
     */
    public function create()
    {
        // Récupérer tous les auteurs et catégories pour les afficher dans le formulaire
        $authors = Author::all();
        $categories = Category::all();

        return view('books.create', compact('authors', 'categories'));
    }

    /**
     * Enregistre un nouveau livre en base (C de CRUD).
     */
    public function store(Request $request)
    {
        // Validation des données entrées par l'utilisateur
        $request->validate([
            'title'      => 'required|string|max:255',
            'author_id'  => 'nullable|exists:authors,id',
            'price'      => 'nullable|numeric|min:0',
            'categories' => 'array', // Si des cases à cocher sont utilisées
        ]);

        // Créer le livre avec les données validées
        $book = Book::create([
            'title'       => $request->title,
            'author_id'   => $request->author_id,
            'description' => $request->description,
            'price'       => $request->price,
        ]);

        // Associer les catégories au livre
        if ($request->has('categories')) {
            $book->categories()->sync($request->categories);
        }

        return redirect()->route('books.index')
                         ->with('success', 'Livre créé avec succès !');
    }

    /**
     * Affiche un livre en particulier (R de CRUD).
     */
public function show(Book $book)
{
    // Charger l'auteur, les catégories et les reviews du livre
    $book->load(['author', 'categories', 'reviews.user']); // Charger également les utilisateurs des reviews

    return view('books.show', compact('book'));
}


    /**
     * Affiche le formulaire d'édition d'un livre (U de CRUD).
     */
    public function edit(Book $book)
    {
        // Récupérer tous les auteurs et catégories pour le formulaire
        $authors = Author::all();
        $categories = Category::all();

        // Charger l'auteur et les catégories du livre
        $book->load(['author', 'categories']);

        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    /**
     * Met à jour un livre en base (U de CRUD).
     */
    public function update(Request $request, Book $book)
    {
        // Validation des données entrées par l'utilisateur
        $request->validate([
            'title'      => 'required|string|max:255',
            'author_id'  => 'nullable|exists:authors,id',
            'price'      => 'nullable|numeric|min:0',
            'categories' => 'array',
        ]);

        // Mettre à jour le livre avec les données validées
        $book->update([
            'title'       => $request->title,
            'author_id'   => $request->author_id,
            'description' => $request->description,
            'price'       => $request->price,
        ]);

        // Mettre à jour les catégories associées
        $book->categories()->sync($request->categories ?? []);

        return redirect()->route('books.index')
                         ->with('success', 'Livre mis à jour avec succès !');
    }

    /**
     * Supprime un livre (D de CRUD).
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
                         ->with('success', 'Livre supprimé avec succès !');
    }
}
