@extends('layouts.app')

@section('content')

<div class="col mb-4 mt-5">
  <div class="card py-5">
    <div class="card-body py-5 text-center">
      <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg">Acessar Área Administrativa</a>
      <a href="{{ url('/servant') }}" class="btn btn-primary btn-lg">Acessar Área do Servidor</a>
      <a href="{{ route('edicts') }}" class="btn btn-primary btn-lg">Lista de Editais</a>
    </div>
  </div>
</div>

@endsection
