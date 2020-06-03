@extends('layouts.admin.app')

@section('title', 'Servidores')
@section('content')

@component('components.index.header', ['base_search_path' => route('admin.servants')]) @endcomponent

<div class="table-responsive mt-3">

  @component('components.index.page_entries_info', ['entries' => $servants]) @endcomponent

  <table class="table card-table table-striped table-vcenter">
    <thead>
      <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>
          Matrícula<i class="fas fa-info-circle d-inline ml-1" data-toggle="tooltip" title="Referente ao último contrato"></i>
        </th>
        <th>
          Cargo<i class="fas fa-info-circle d-inline ml-1" data-toggle="tooltip" title="Referente ao último contrato"></i></th>
        <th>
          Local de trabalho<i class="fas fa-info-circle d-inline ml-1" data-toggle="tooltip" title="Referente ao último contrato"></i></th>
      </tr>
    </thead>
    <tbody>
      @each('admin.servants._servant_row', $servants, 'servant')
    </tbody>
  </table>

  <div class="mt-5 float-right flex-wrap">
    {!! prettyPaginationLinks($servants->links()) !!}
  </div>

</div>
@endsection
