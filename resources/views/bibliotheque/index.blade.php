@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Bienvenue à la Bibliothèque</h1>

        <!-- Livres Section -->
        <h2>Livres</h2>
        <ul>
            @forelse($livres as $livre)
                <li>{{ $livre->titre }}</li>
            @empty
                <p>Aucun livre disponible.</p>
            @endforelse
        </ul>

        <h2>Auteurs</h2>
        <ul>
            @forelse($auteurs as $auteur)
                <li>{{ $auteur->nom }}</li>
            @empty
                <p>Aucun auteur disponible.</p>
            @endforelse
        </ul>
    </div>
@endsection
