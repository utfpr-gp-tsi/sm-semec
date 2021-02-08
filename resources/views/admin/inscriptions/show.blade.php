@extends('layouts.admin.app')

@section('title', 'Inscrição Edital - '. $inscription->edict->title)
@section('content')

@include('shared.inscriptions._show')

@component('components.links.back_and_edit', ['back_url' => route('admin.inscriptions', $inscription->edict->id)]) @endcomponent

@endsection
