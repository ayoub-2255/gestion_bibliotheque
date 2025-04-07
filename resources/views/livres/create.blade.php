@extends('layouts.app')

@section('content')
    <h1>Ajouter un Livre</h1>
    @include('livres.form', ['action' => route('livres.store'), 'buttonText' => 'Ajouter'])
@endsection
