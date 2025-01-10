<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Route /dashboard protégée par l'authentification et la vérification d'email
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées par authentification
Route::middleware('auth')->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD complet sur la ressource "books"
    Route::resource('books', BookController::class);

    // CRUD complet sur la ressource "authors"
    Route::resource('authors', AuthorController::class);

    // CRUD complet sur la ressource "categories"
    Route::resource('categories', CategoryController::class);

    // Routes pour les reviews (création uniquement via le formulaire sur la page du livre)
    Route::post('/books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

// Inclusion des routes d’authentification générées par Laravel (Breeze, Jetstream, etc.)
require __DIR__.'/auth.php';
