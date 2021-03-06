@extends('layouts.admin.app')

@section('title', 'Inscrições Edital - ' . $edict->title)
@section('content')

<div class="table-responsive mt-3">
  <table class="table card-table table-striped table-vcenter table-data">
    <thead>
      <tr>
        <th>Servidor</th>
        <th>Matricula</th>
        <th>Tipo de Remoção</th>
        <th>Realizada em</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @each('admin.inscriptions._inscription_row', $edict->inscriptions, 'inscription')
    </tbody>
  </table>
</div>

<div class="mt-5 float-left flex-wrap">
  @component('components.links.back_and_edit', ['back_url' => route('admin.edicts')]) @endcomponent
</div>

@endsection
