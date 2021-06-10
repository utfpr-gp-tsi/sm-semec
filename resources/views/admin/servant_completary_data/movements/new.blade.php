@extends('layouts.admin.app')

@section('title', 'Nova Movimentação')
@section('content')

@include('admin.servant_completary_data.movements._form', ['route' => route('admin.create.movement', ['servant_id' => $completaryData->contract->servant_id, 'contract_id' => $completaryData->contract_id, 'id' => $completaryData->id]), 'method' => 'POST', 'submit' => 'Criar Movimentação'])

@endsection
