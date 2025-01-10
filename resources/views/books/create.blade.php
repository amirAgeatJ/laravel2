@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer un Livre</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $erreur)
                        <li>{{ $erreur }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 10px;">
                <label>Titre</label><br>
                <input type="text" name="title" value="{{ old('title') }}" required style="width: 100%; padding: 8px;">
            </div>
            <div style="margin-bottom: 10px;">
                <label>Auteur</label><br>
                <select name="author_id" style="width: 100%; padding: 8px;">
                    <option value="">-- Aucun --</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                            {{ old('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div style="margin-bottom: 10px;">
                <label>Catégories</label><br>
                @foreach($categories as $category)
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                        {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) ? 'checked' : '' }}>
                    {{ $category->name }}<br>
                @endforeach
            </div>
            <div style="margin-bottom: 10px;">
                <label>Description</label><br>
                <textarea name="description" style="width: 100%; padding: 8px;">{{ old('description') }}</textarea>
            </div>
            <div style="margin-bottom: 10px;">
                <label>Prix (€)</label><br>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" style="width: 100%; padding: 8px;">
            </div>
            <button type="submit" style="padding: 10px 20px;">Enregistrer</button>
        </form>
    </div>
@endsection
