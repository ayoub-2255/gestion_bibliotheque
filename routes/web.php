<?php

use App\Http\Controllers\BibliothequeController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuteurController;

// Set Bibliothèque as the homepage
Route::get('/', [BibliothequeController::class, 'index'])->name('bibliotheque.index');

// Resource routes for Auteurs and Livres
Route::resource('auteurs', AuteurController::class);
Route::resource('livres', LivreController::class);

