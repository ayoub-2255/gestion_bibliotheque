@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Liste des Livres</h1>
        <a href="{{ route('livres.create') }}" class="btn btn-primary mb-3">Ajouter un Livre</a>

        <table class="table table-bordered table-striped table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Résumé</th>
                    <th>Auteur</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($livres as $livre)
                    <tr>
                        <td>{{ $livre->id }}</td>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->resume }}</td>
                        <td>{{ $livre->auteur->nom ?? 'Non Assigné' }}</td>
                        <td>
                            <!-- Image display logic with max size control -->
                            @if ($livre->image)
                                <img src="{{ asset('storage/images/' . $livre->image) }}" alt="{{ $livre->titre }}" style="max-width: 150px; max-height: 150px; object-fit: contain;">
                            @else
                                <span class="text-muted">Image non disponible</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('livres.destroy', $livre) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucun livre trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
