@extends('layouts.admin.app')

@section('title', 'Editar Movimentação')
@section('content')

@include('admin.servant_completary_data.movements._form', ['route' => route('admin.update.movement', ['servant_id' => $movement->servantCompletaryData->contract->servant_id, 'contract_id' => $movement->servantCompletaryData->contract_id, 'completaryData_id' => $movement->servantCompletaryData->id, 'id' => $movement->id]), 'method' => 'patch', 'submit' => 'Atualizar Movimentação'])

@endsection
