@extends('layouts.admin.app')

@section('title', 'Inscrição Edital - '. $inscription->edict->title)
@section('content')

<div class="card">
  <div class="card-body">
  	<p><strong>Servidor: </strong>{{ $inscription->servant->name }}</p>
  	<p><strong>Matrícula: </strong>{{ $inscription->contract->registration }}</p>
  	<p><strong>Unidade de Interesse: </strong>{{ $inscription->interestedUnit->name }}</p>
  	<p><strong>Unidade Atual: </strong>{{ $inscription->currentUnit->name }}</p>
  	<p><strong>Tipo de Remoção: </strong>{{ $inscription->removalType->name }}</p>
  	<p><strong>Motivo: </strong>{{ $inscription->reason }}</p>
  </div>
</div>

@component('components.links.back_and_edit', ['back_url' => route('admin.inscriptions', $inscription->edict->id)]) @endcomponent

@endsection
