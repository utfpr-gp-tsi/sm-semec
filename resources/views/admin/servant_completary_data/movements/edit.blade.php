@extends('layouts.admin.app')

@section('title', 'Editar Movimentação')
@section('content')

<form action="{{route('admin.update.movement', ['servant_id' => $movement->servantCompletaryData->contract->servant_id, 'contract_id' => $movement->servantCompletaryData->contract_id, 'completaryData_id' => $movement->servantCompletaryData->id, 'id' => $movement->id])}}" method="post" novalidate>
    @csrf
@method('PATCH')

    @component('components.form.input_text', ['field'    => 'occupation',
                                              'label'    => 'Função',
                                              'model'    => 'movement',
                                              'value'    => $movement->occupation,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_radio_button', ['field'    => 'period',
                                              'label'    => 'Período',
                                              'model'    => 'movement',
                                              'values'   => [0 => 'morning' , 1 => 'evening'],
                                              'value'    => $movement->period,
                                              'value_method' => '',
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

  @component('components.form.input_select', ['field'    => 'unit_id',
                                              'label'    => 'Lotação',
                                              'model'    => 'movement',
                                              'value'    => $movement->unit_id,
                                              'options'  => $units,
                                              'required' => true,
                                              'default'  => 'Selecione uma Lotação',
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_datetimepicker', [
                                              'field'    => 'started_at',
                                              'label'    => 'Início',
                                              'model'    => 'movement',
                                              'value'    => $movement->started_at,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_datetimepicker', [
                                              'field'    => 'ended_at',
                                              'label'    => 'Término',
                                              'model'    => 'movement',
                                              'value'    => $movement->ended_at,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

   @component('components.form.input_submit', ['value' => 'Atualizar', 'back_url' => route('admin.index.completary_datas', ['servant_id' => $movement->servantCompletaryData->contract->servant_id, 'id' => $movement->servantCompletaryData->contract_id])]) @endcomponent
</form>

@endsection
