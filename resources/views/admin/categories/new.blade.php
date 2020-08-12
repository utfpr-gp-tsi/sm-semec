@extends('layouts.admin.app')

@section('title', 'Nova Categoria')
@section('content')

@include('admin.categories._form', ['route' => route('admin.create.category'), 'method' => 'POST', 'submit' => 'Criar Categoria'])

@endsection
