<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Auteur;

class BibliothequeController extends Controller
{
    public function index()
    {
        $livres = Livre::all();   // Fetch all books
        $auteurs = Auteur::all(); // Fetch all authors

        return view('bibliotheque.index', compact('livres', 'auteurs'));
    }
}
