@extends('layouts.app')

@section('content')
    <h1>Modifier l'Auteur</h1>
    @include('auteurs.form', ['action' => route('auteurs.update', $auteur), 'method' => 'PUT', 'buttonText' => 'Mettre à jour'])
@endsection
