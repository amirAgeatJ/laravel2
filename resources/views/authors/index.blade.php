@extends('layouts.app')

@section('content')
    <div class="container">
                 <!-- Boutons de navigation vers Catégories et Auteurs -->
                        <div style="margin-bottom: 20px;">
                            <a href="{{ route('categories.index') }}" style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-right: 10px;">
                                Voir les Catégories
                            </a>
                            <a href="{{ route('books.index') }}" style="padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;">
                                Voir les Livres
                            </a>
                        </div>
        <h1>Liste des Auteurs</h1>

        @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('authors.create') }}">Créer un nouvel auteur</a>

        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->nationality ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author->id) }}">Voir</a> |
                            <a href="{{ route('authors.edit', $author->id) }}">Éditer</a> |
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet auteur ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
