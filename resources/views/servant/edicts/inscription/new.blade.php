@extends('layouts.servant.app')

@section('title', 'Inscreva-se')

@section('content')

<form action="{{route('servant.create.inscription', $edict->id)}}" method="post" enctype="multipart/form-data" novalidate>

  @csrf

@component('components.form.input_select',['field' => 'contract_id',
             'label'    => 'Matrícula',
             'model'    => 'subscription',
             'value'    => $subscription->contract_id,
             'options'  => $contracts,
             'default' => 'Selecione uma Matricula:',
             'value_method' => 'id',
             'label_method' => 'registration',
             'required' => true,
             'errors'   => $errors]) @endcomponent

  @component('components.form.input_radio',['field' => 'removal_type',
             'label'    => 'Tipo de remoção',
             'model'    => 'subscription',
             'value'    => $subscription->removal_type,
             'required' => true,
             'errors'   => $errors]) @endcomponent

  @component('components.form.input_text',['field' => 'place',
             'label'    => 'Unidade atual',
             'model'    => 'contract',
             'value'    => $contracts[0]->place,
                        'required' => true,
             'errors'   => $errors]) @endcomponent

  @component('components.form.input_select',['field' => 'unit_id',
             'label'    => 'Unidade de interesse',
             'model'    => 'subscription',
             'value'    => $subscription->unit_id,
             'options'  => $units,
             'default' => 'Selecione uma Unidade:',
                        'required' => true,
             'errors'   => $errors]) @endcomponent

  @component('components.form.input_textarea',['field' => 'reason',
             'label'    => 'Motivo',
             'model'    => 'subscription',
             'value'    => $subscription->reason,
                        'required' => true,
             'errors'   => $errors]) @endcomponent

   @component('components.form.input_submit', ['value' => 'Enviar', 'back_url' => route('servant.dashboard')]) @endcomponent
</form>
@endsection
