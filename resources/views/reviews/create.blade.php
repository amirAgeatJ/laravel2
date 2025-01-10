@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rédiger un nouvel avis</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $erreur)
                        <li>{{ $erreur }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <div>
                <label>Livre</label>
                <select name="book_id" required>
                    <option value="">-- Choisir un livre --</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}"
                            {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Note (rating) :</label>
                <input type="number" name="rating" value="{{ old('rating', 3) }}" min="1" max="5">
            </div>
            <div>
                <label>Contenu</label>
                <textarea name="content" required>{{ old('content') }}</textarea>
            </div>
            <button type="submit">Publier l'avis</button>
        </form>
    </div>
@endsection
