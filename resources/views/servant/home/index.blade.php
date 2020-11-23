@extends('layouts.servant.app')
@section('title', 'Dashboard')

@section('content')

{{-- TODO: REMOVE AFTER EDICTS LIST --}}
@if (\App\Models\Edict::count() > 0)
    <a class="btn btn-primary" href="{{ route('servant.new.inscription', \App\Models\Edict::first()) }}">
        Inscrever-se (Remover após listagem dos editais)
    </a>
@endif

@endsection
