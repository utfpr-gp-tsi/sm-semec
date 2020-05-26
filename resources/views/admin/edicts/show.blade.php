@extends('layouts.admin.app')

@section('title', 'Edital')
@section('content')

<div class="card">
  <div class="card-body">
    <p><strong>Nome: </strong> {{ $edict->name }}</p>
    <p><strong>Decrição: </strong> {{ $edict->description }}</p>
    <p><strong>Aberto em: </strong> {{ $edict->created_at }}</p>
    <p><strong>Válido até: </strong> {{ $edict->ended_at }}</p>
  </div>
</div>

@component('components.links.back_and_edit', ['edit_url' => route('admin.edit.edict', $edict->id),
                                              'back_url' => route('admin.edicts')]) @endcomponent

@endsection
