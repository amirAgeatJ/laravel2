@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Éditer l'Auteur</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $erreur)
                        <li>{{ $erreur }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 10px;">
                <label>Nom</label><br>
                <input type="text" name="name" value="{{ old('name', $author->name) }}" required style="width: 100%; padding: 8px;">
            </div>
            <div style="margin-bottom: 10px;">
                <label>Nationalité</label><br>
                <input type="text" name="nationality" value="{{ old('nationality', $author->nationality) }}" style="width: 100%; padding: 8px;">
            </div>
            <div style="margin-bottom: 10px;">
                <label>Biographie</label><br>
                <textarea name="biography" style="width: 100%; padding: 8px;">{{ old('biography', $author->biography) }}</textarea>
            </div>
            <button type="submit" style="padding: 10px 20px;">Mettre à Jour</button>
        </form>
    </div>
@endsection
