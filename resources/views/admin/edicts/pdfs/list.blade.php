@extends('layouts.admin.app')

@section('title', 'Editais Abertos')
@section('content')

@foreach($dates as $link)
    <p><a href="#edital{{$link->year}}" class="btn btn-pill btn-success" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" style="background: #32b361; border: 1px solid #32b361; padding: 2px 20px; opacity: 8;">{{ $link->year}}</a></p>

    <div class="collapse" id="edital{{$link->year}}">

@foreach ($edicts as $edict)

<p><a href="#edital{{$edict->id}}" class="btn btn-pill btn-success" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" style="background: #32b361; border: 1px solid #32b361; padding: 2px 20px; opacity: 8;">{{ $edict->title  }}</a></p>

<div class="collapse" id="edital{{$edict->id}}">
  <div class="card card-body">
    <p>{{$edict->title}}</p>
      @each('admin.edicts.pdfs._list_row', $edict->pdfs, 'pdfs')
  </div>
</div>
@endforeach

</div>

@endforeach
    




    @foreach ($edicts as $edict)

<p><a href="#edital{{$edict->id}}" class="btn btn-pill btn-success" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" style="background: #32b361; border: 1px solid #32b361; padding: 2px 20px; opacity: 8;">{{ $edict->title }}</a></p>

<div class="collapse" id="edital{{$edict->id}}">
  <div class="card card-body">
    <p>{{$edict->title}}</p>
      @each('admin.edicts.pdfs._list_row', $edict->pdfs, 'pdfs')
  </div>
</div>
@endforeach

@endsection
