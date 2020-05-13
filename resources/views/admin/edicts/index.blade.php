@extends('layouts.admin.app')

@section('title', 'Editais')
@section('content')

@component('components.index.header', ['search_url' => route('admin.search.users'), 'new_url' => route('admin.new.edict')]) @endcomponent

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
    
    </tbody>
  </table>
</div>
@endsection