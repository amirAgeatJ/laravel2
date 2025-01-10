@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer une catégorie</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $erreur)
                        <li>{{ $erreur }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div>
                <label>Nom</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>
            <div>
                <label>Description</label>
                <textarea name="description">{{ old('description') }}</textarea>
            </div>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
@endsection
