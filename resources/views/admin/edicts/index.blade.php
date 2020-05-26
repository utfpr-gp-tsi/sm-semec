@extends('layouts.admin.app')

@section('title', 'Editais')
@section('content')

@component('components.index.header', ['search_url' => route('admin.search.edicts'), 'new_url' => route('admin.new.edict'), 'value' => 'Criar Edital']) @endcomponent

<div class="table-responsive mt-3">
  <table class="table card-table table-striped table-vcenter table-data">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Válido até</th>
        <th>Aberto em</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @each('admin.edicts._edict_row', $edicts, 'edict')
    </tbody>
  </table>
</div>
@endsection