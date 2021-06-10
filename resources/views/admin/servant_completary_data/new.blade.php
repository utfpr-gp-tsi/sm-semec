@extends('layouts.admin.app')

@section('title', 'Cadastro Complementar - '. $contract->servant->name. ', '.$contract->registration)
@section('content')

@include('admin.servant_completary_data._form', ['route' => route('admin.create.completary_data',  ['servant_id' => $contract->servant_id, 'id' => $contract->id]), 'method' => 'POST', 'submit' => 'Criar Cadastro'])

@endsection
