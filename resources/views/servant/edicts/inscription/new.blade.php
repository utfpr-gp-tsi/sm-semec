@extends('layouts.servant.app')

@section('title', 'Inscreva-se')

@section('content')

<form action="{{route('servant.subscribe')}}" method="post" enctype="multipart/form-data" novalidate>

  @csrf

  @component('components.form.input_text',['field' => 'name',
             'label'    => 'Nome',
             'model'    => 'servant',
             'value'    => $servant->name,
                        'required' => true,
             'errors'   => $errors]) @endcomponent

  @component('components.form.input_radio',['field' => 'removal_type',
             'label'    => 'Tipo de remoção',
             'model'    => 'subscription',
             'value'    => 'Interesse', 
                        'required' => true,
             'errors'   => $errors]) @endcomponent

  @component('components.form.input_text',['field' => 'place',
             'label'    => 'Unidade atual',
             'model'    => 'contract',
             'value'    => $contracts,
                        'required' => true,
             'errors'   => $errors]) @endcomponent

  @component('components.form.input_text',['field' => 'interest_unit',
             'label'    => 'Unidade de interesse',
             'model'    => 'subscription',
             'value'    => $subscription->interest_unit,
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