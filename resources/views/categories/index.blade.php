@extends('layouts.app')

@section('content')
    <div class="container">
                 <!-- Boutons de navigation vers Catégories et Auteurs -->
                        <div style="margin-bottom: 20px;">
                            <a href="{{ route('books.index') }}" style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-right: 10px;">
                                Voir les livres
                            </a>
                            <a href="{{ route('authors.index') }}" style="padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;">
                                Voir les Auteurs
                            </a>
                        </div>
        <h1>Liste des catégories</h1>

        @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('categories.create') }}">Créer une nouvelle catégorie</a>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}">Voir</a> |
                            <a href="{{ route('categories.edit', $category->id) }}">Éditer</a> |
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
