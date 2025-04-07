<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method ?? false)
        @method($method)
    @endif

    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $auteur->nom ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="biographie" class="form-label">Biographie</label>
        <textarea name="biographie" id="biographie" class="form-control">{{ old('biographie', $auteur->biographie ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</form>
