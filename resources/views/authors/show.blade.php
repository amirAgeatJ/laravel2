@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de l'Auteur</h1>
        <h2>{{ $author->name }}</h2>
        <p><strong>Nationalité :</strong> {{ $author->nationality ?? 'N/A' }}</p>
        <p><strong>Biographie :</strong> {{ $author->biography }}</p>

        <h3>Livres de cet Auteur</h3>
        @if($author->books->count())
            <ul>
                @foreach($author->books as $book)
                    <li>{{ $book->title }}</li>
                @endforeach
            </ul>
        @else
            <p>Aucun livre pour cet auteur.</p>
        @endif

        <a href="{{ route('authors.index') }}">Retour à la Liste</a>
    </div>
@endsection
