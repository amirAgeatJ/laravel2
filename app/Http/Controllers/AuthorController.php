<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Liste tous les auteurs (R de CRUD).
     */
    public function index()
    {
        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    /**
     * Affiche le formulaire de création d'un auteur (C de CRUD).
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Enregistre un nouvel auteur en base (C de CRUD).
     */
    public function store(Request $request)
    {
        // Validation des données entrées par l'utilisateur
        $request->validate([
            'name'        => 'required|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'biography'   => 'nullable|string',
        ]);

        // Créer l'auteur avec les données validées
        Author::create([
            'name'        => $request->name,
            'nationality' => $request->nationality,
            'biography'   => $request->biography,
        ]);

        return redirect()->route('authors.index')
                         ->with('success', 'Auteur créé avec succès !');
    }

    /**
     * Affiche un auteur en particulier (R de CRUD).
     */
    public function show(Author $author)
    {
        // Charger les livres de l'auteur
        $author->load('books');

        return view('authors.show', compact('author'));
    }

    /**
     * Affiche le formulaire d'édition d'un auteur (U de CRUD).
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Met à jour un auteur en base (U de CRUD).
     */
    public function update(Request $request, Author $author)
    {
        // Validation des données entrées par l'utilisateur
        $request->validate([
            'name'        => 'required|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'biography'   => 'nullable|string',
        ]);

        // Mettre à jour l'auteur avec les données validées
        $author->update([
            'name'        => $request->name,
            'nationality' => $request->nationality,
            'biography'   => $request->biography,
        ]);

        return redirect()->route('authors.index')
                         ->with('success', 'Auteur mis à jour avec succès !');
    }

    /**
     * Supprime un auteur (D de CRUD).
     */
    public function destroy(Author $author)
    {
        // Supprimer l'auteur (les livres associés auront author_id = null grâce à onDelete('set null'))
        $author->delete();

        return redirect()->route('authors.index')
                         ->with('success', 'Auteur supprimé avec succès !');
    }
}
