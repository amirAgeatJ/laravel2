@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Éditer l'avis</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $erreur)
                        <li>{{ $erreur }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Livre</label>
                <select name="book_id">
                    <option value="">-- Choisir un livre --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}"
                            {{ old('book_id', $review->book_id) == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Note (rating) :</label>
                <input type="number" name="rating" value="{{ old('rating', $review->rating) }}" min="1" max="5">
            </div>
            <div>
                <label>Contenu</label>
                <textarea name="content" required>{{ old('content', $review->content) }}</textarea>
            </div>
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
@endsection
