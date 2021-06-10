@extends('layouts.admin.app')

@section('title', 'Editar Cadastro Complementar - '. $contract->servant->name. ', '.$contract->registration)
@section('content')

@include('admin.servant_completary_data._form', ['route' => route('admin.update.completary_data', ['servant_id' => $contract->servant_id, 'contract_id' => $contract->id ,
'id' => $completaryData->id] ), 'method' => 'patch', 'submit' => 'Atualizar Cadastro'])

@endsection
