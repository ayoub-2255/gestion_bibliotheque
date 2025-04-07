@extends('layouts.app')

@section('content')
    <h1>Modifier le Livre</h1>
    @include('livres.form', ['action' => route('livres.update', $livre), 'method' => 'PUT', 'buttonText' => 'Mettre à jour'])
@endsection
