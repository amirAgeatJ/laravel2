@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des avis (Reviews)</h1>

        @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('reviews.create') }}">Rédiger un nouvel avis</a>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Contenu</th>
                    <th>Note</th>
                    <th>Livre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ Str::limit($review->content, 50) }}</td>
                        <td>{{ $review->rating }}/5</td>
                        <td>
                            @if($review->book)
                                {{ $review->book->title }}
                            @else
                                <em>Pas de livre</em>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('reviews.show', $review->id) }}">Voir</a> |
                            <a href="{{ route('reviews.edit', $review->id) }}">Éditer</a> |
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
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
