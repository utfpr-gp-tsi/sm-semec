@extends('layouts.servant.app')

@section('title', 'Editais')
@section('content')

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#edicts-open" role="tab" data-toggle="tab">Editais Abertos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('servant.edicts.close') }}" >Editais Fechados</a>
  </li>
</ul>
@component('components.index.header', ['base_search_path' => route('servant.edicts')]) @endcomponent
<div class="tab-content">
  <div role="tabPanel" class="tab-pane active " id="edicts-open"> 
  <div class="table-responsive mt-3">
  @component('components.index.page_entries_info', ['entries' => $edicts]) @endcomponent
    <table class="table card-table table-striped table-vcenter table-data">
      <thead>
        <tr>
          <th>Título</th>
          <th>Aberto em</th>
          <th>Válido até</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @each('servant.edicts._edict_open_row', $edicts, 'edict')
      </tbody>
    </table>
    <div class="mt-5 float-right flex-wrap">
      {!! prettyPaginationLinks($edicts->links()) !!}
    </div>
  </div>
  </div>
</div>
@endsection
