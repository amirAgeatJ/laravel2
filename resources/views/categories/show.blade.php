@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de la catégorie</h1>
        <h2>{{ $category->name }}</h2>
        <p><strong>Description :</strong> {{ $category->description }}</p>

        <h3>Livres dans cette catégorie :</h3>
        @if($category->books->count())
            <ul>
            @foreach($category->books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
            </ul>
        @else
            <p>Aucun livre dans cette catégorie.</p>
        @endif

        <a href="{{ route('categories.index') }}">Retour à la liste</a>
    </div>
@endsection
