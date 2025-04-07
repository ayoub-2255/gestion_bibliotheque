<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method ?? false)
        @method($method)
    @endif

    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $livre->titre ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="resume" class="form-label">Résumé</label>
        <textarea name="resume" id="resume" class="form-control">{{ old('resume', $livre->resume ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="auteur_id" class="form-label">Auteur</label>
        <select name="auteur_id" id="auteur_id" class="form-control" required>
            @foreach ($auteurs as $auteur)
                <option value="{{ $auteur->id }}" {{ old('auteur_id', $livre->auteur_id ?? '') == $auteur->id ? 'selected' : '' }}>
                    {{ $auteur->nom }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" id="image" class="form-control">
        @if (isset($livre) && $livre->image)
            <img src="{{ asset('storage/' . $livre->image) }}" alt="Image actuelle" width="100" class="mt-2">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</form>
