@extends('layouts.admin.app')

@section('title', 'Dados Complementares - '. $contract->servant->name. ', '.$contract->registration)
@section('content')

@include('admin.servant_completary_data._contract_data')

<fieldset class="border p-2 mt-5">
  <legend  class="w-auto">Dados Adicionais</legend>
@if($completaryData == null)
  <a href="{{ route('admin.new.completary_data', ['servant_id' => $contract->servant_id, 'id' => $contract->id]) }}" class="btn btn-outline-primary d-block col-md-2 ml-md-auto">
    <i class="fas fa-plus"></i>
    Novo Cadastro Complementar
  </a>
@endisset

  @isset($completaryData)

    @component('components.form.input_text', ['field'    => 'formation',
                                              'label'    => 'Formação Acadêmica',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $completaryData->formation,
                                              'disabled' => 'readonly',
                                              'required' => false,
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_text', ['field'    => 'workload_id',
                                              'label'    => 'Carga Horária',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $completaryData->workload->hours,
                                              'disabled' => 'readonly',
                                              'required' => false,
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_textarea', ['field'    => 'observation',
                                             'label'    => 'Observação',
                                             'model'    => 'servantCompletaryData',
                                             'value'    => $completaryData->observation,
                                             'disabled' => 'readonly',
                                             'required' => false,
                                             'errors'   => $errors]) @endcomponent

    <a href="{{ route('admin.edit.completary_data', ['servant_id' => $completaryData->contract->servant_id, 'contract_id' => $completaryData->contract_id, 'id' => $completaryData->id]) }}" class="btn btn-outline-primary d-block col-md-2 ml-md-auto">
        <i class="fas fa-plus"></i>
        Editar Cadastro Complementar
      </a>
    @endisset
</fieldset>

  @isset($completaryData)
     @include('admin.servant_completary_data.movements.index')
  @endisset

@endsection