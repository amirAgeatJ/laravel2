@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails du livre</h1>
        <h2>{{ $book->title }}</h2>
        <p><strong>Auteur :</strong>
            @if($book->author)
                {{ $book->author->name }}
            @else
                <em>Aucun auteur</em>
            @endif
        </p>
        <p><strong>Catégories :</strong><br>
            @if($book->categories->count())
                @foreach($book->categories as $category)
                    <span>{{ $category->name }}</span><br>
                @endforeach
            @else
                <em>Pas de catégorie</em>
            @endif
        </p>
        <p><strong>Description :</strong> {{ $book->description }}</p>
        <p><strong>Prix :</strong> {{ number_format($book->price, 2) }} €</p>

        <hr>

        <h3>Avis ({{ $book->reviews->count() }})</h3>

        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        @if($book->reviews->count())
            @foreach($book->reviews as $review)
                <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                    <p><strong>{{ $review->user->name }}</strong> a noté ce livre {{ $review->rating }}/5</p>
                    <p>{{ $review->content }}</p>
                    <small>Posté le {{ $review->created_at->format('d/m/Y à H:i') }}</small>
                </div>
            @endforeach
        @else
            <p>Aucun avis pour ce livre.</p>
        @endif

        <hr>

        @auth
            <h3>Publier un avis</h3>

            @if ($errors->any())
                <div style="color:red;">
                    <ul>
                        @foreach ($errors->all() as $erreur)
                            <li>{{ $erreur }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reviews.store', $book->id) }}" method="POST">
                @csrf
                <div style="margin-bottom: 10px;">
                    <label>Note (1-5)</label><br>
                    <select name="rating" required style="width: 100%; padding: 8px;">
                        <option value="">-- Sélectionner une note --</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div style="margin-bottom: 10px;">
                    <label>Contenu de l'avis</label><br>
                    <textarea name="content" rows="4" required style="width: 100%; padding: 8px;">{{ old('content') }}</textarea>
                </div>
                <button type="submit" style="padding: 10px 20px;">Publier l'avis</button>
            </form>
        @else
            <p><a href="{{ route('login') }}">Connectez-vous</a> pour publier un avis.</p>
        @endauth

        <a href="{{ route('books.index') }}">Retour à la liste</a>
    </div>
