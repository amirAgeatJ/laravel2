@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Éditer la catégorie</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $erreur)
                        <li>{{ $erreur }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Nom</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
            </div>
            <div>
                <label>Description</label>
                <textarea name="description">{{ old('description', $category->description) }}</textarea>
            </div>
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
@endsection
