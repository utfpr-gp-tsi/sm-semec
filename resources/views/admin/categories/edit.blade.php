@extends('layouts.admin.app')

@section('title', 'Editar Categorias')
@section('content')

@include('admin.categories._form', ['route' => route('admin.update.category', $category->id), 'method' => 'patch', 'submit' => 'Atualizar Categorias'])

@endsection
