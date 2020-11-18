<form action="{{ $route }}" method="POST" novalidate>
    @csrf
    @method($method)

    @component('components.form.input_text', ['field'    => 'contract_id',
                                              'label'    => 'Local de Trabalho',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $contract->place,
                                              'required' => false,
                                              'disable_field' => 'readonly',
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_text', ['field'    => 'contract_id',
                                              'label'    => 'Cargo',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $contract->role,
                                              'required' => false,
                                              'disable_field' => 'readonly',
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_text', ['field'    => 'contract_id',
                                              'label'    => 'Lotação',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $contract->place,
                                              'required' => false,
                                              'disable_field' => 'readonly',
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_text', ['field'    => 'occupation',
                                              'label'    => 'Função',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $completaryData->occupation,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_select', ['field'    => 'workload_id',
                                              'label'    => 'Carga Horária',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $completaryData->workload_id,
                                              'options'  => $workloads,
                                              'required' => true,
                                              'default'  => 'Selecione a Carga Horária',
                                              'errors'   => $errors]) @endcomponent


    @component('components.form.input_radio_button', ['field'    => 'period',
                                              'label'    => 'Período',
                                              'model'    => 'servantCompletaryData',
                                              'values'   => [0 => 'morning' , 1 => 'evening'],
                                              'value'    => $completaryData->period,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent


    @component('components.form.input_submit',['value' => $submit, 'back_url' => route('admin.index.completary_data', $contract->servant_id)]) @endcomponent

</form>
