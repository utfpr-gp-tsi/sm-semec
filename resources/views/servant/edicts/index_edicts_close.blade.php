@extends('layouts.servant.app')

@section('title', 'Editais')
@section('content')

  @component('components.index.header', ['base_search_path' => route('servant.edicts.close'),
                                         'size_search' => 'col-sm-12 col-lg-12']) @endcomponent
    @component('components.index.page_entries_info', ['entries' => $edicts]) @endcomponent

<ul class="nav nav-tabs mb-6">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('servant.edicts') }} ">Editais Abertos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('servant.edicts.close') }}" >Editais Fechados</a>
  </li>
</ul>

<div role="tabPanel" class="tab-pane active " href="{{ route('servant.edicts.close') }}"> 
  <div class="table-responsive mt-3">
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
        @each('servant.edicts._edict_close_row', $edicts, 'edict')
      </tbody>
    </table>
    <div class="mt-5 float-right flex-wrap">
      {!! prettyPaginationLinks($edicts->links()) !!}
    </div>
  </div>
</div>
@endsection
