@extends('layouts.servant.app')
@section('title', 'Dashboard')

@section('content')

<a class="btn btn-primary" href="{{ route('servant.new.inscription', \App\Models\Edict::first()) }}">Inscrever-se (Remover após listagem dos editais)</a>

@endsection
