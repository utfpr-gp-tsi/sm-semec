@extends('layouts.app')
@section('title', '')

@section('content')

<div class="col mb-4 mt-5">
  <div class="card py-5">
    <div class="card-body py-5 card-home">
      <a href="{{ route('index') }}" class="btn btn-primary btn-lg">Acessar Área Administrativa</a>
    </div>
  </div>
</div>

@endsection
