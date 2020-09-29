@extends('layouts.app')

@section('title', 'Lista de Editais')
@section('content')

<div class="card-header mb-3">
  <h1 class="page-title title-edicts" >
    Lista de Editais
  </h1>
</div>

@foreach ($edicts as $year => $edicts_list)
<div class="card mb-2" id="accordion">

  <div class="card-header collapse-edicts" id="edict">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#edict{{$year}}" aria-expanded="false" aria-controls="edict">
        {{$year}}
      </button>
  </div>

  <div id="edict{{$year}}" class="collapse" aria-labelledby="edict" data-parent="#accordion">
        @foreach ($edicts_list as $edict)
    <div class="card-header collapse-edicts" id="edict">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#edict{{$edict->id}}" aria-expanded="false" aria-controls="edict">
          {{$edict->title}}
        </button>
    </div>

    <div id="edict{{$edict->id}}" class="collapse">
      <div class="card-body ml-3">
          @each('home.edicts._list_row', $edict->pdfs, 'pdfs')
      </div>
    </div>
        @endforeach
  </div>

</div>
@endforeach

@endsection