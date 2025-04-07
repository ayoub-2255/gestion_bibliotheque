@extends('layouts.app')

@section('content')
    <h1>Ajouter un Auteur</h1>
    @include('auteurs.form', ['action' => route('auteurs.store'), 'buttonText' => 'Ajouter'])
@endsection
