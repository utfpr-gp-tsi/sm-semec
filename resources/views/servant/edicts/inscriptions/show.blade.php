@extends('layouts.servant.app')

@section('title', 'Inscrição Edital - '. $inscription->edict->title)
@section('content')

@include('shared.inscriptions._show')

@component('components.links.back_and_edit', ['back_url' => route('servant.inscriptions')]) @endcomponent

@endsection
