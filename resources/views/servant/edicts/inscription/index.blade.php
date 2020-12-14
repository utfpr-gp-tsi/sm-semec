@extends('layouts.servant.app')

@section('title', 'Minhas Inscrições')

@section('content')

<div class="table-responsive mt-3">
  <table class="table card-table table-striped table-vcenter table-data">
    <thead>
      <tr>
        <th>Edital</th>
        <th>Matrícula</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    @each('servant.edicts.inscription._inscription_row', $servant, 'inscription')    

    </tbody>
  </table>
</div>


@endsection
