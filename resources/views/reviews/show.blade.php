@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de l'avis</h1>
        <p><strong>Note :</strong> {{ $review->rating }}/5</p>
        <p><strong>Livre :</strong>
            @if($review->book)
                {{ $review->book->title }}
            @else
                <em>Pas de livre lié</em>
            @endif
        </p>
        <p><strong>Contenu :</strong></p>
        <p>{{ $review->content }}</p>

        <a href="{{ route('reviews.index') }}">Retour à la liste des avis</a>
    </div>
@endsection
