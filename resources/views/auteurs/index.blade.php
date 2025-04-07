@extends('layouts.app')

@section('content')
    <h1>Liste des Auteurs</h1>
    <a href="{{ route('auteurs.create') }}" class="btn btn-primary mb-3">Ajouter un Auteur</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Biographie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auteurs as $auteur)
                <tr>
                    <td>{{ $auteur->id }}</td>
                    <td>{{ $auteur->nom }}</td>
                    <td>{{ $auteur->biographie }}</td>
                    <td>
                        <a href="{{ route('auteurs.edit', $auteur) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('auteurs.destroy', $auteur) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
