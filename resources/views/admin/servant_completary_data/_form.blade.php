<form action="{{ $route }}" method="POST" novalidate>
    @csrf
    @method($method)

    @component('components.form.input_text', ['field'    => 'formation',
                                              'label'    => 'Formação Acadêmica',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $completaryData->formation,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_radio_button', ['field'    => 'workload_id',
                                              'label'    => 'Carga Horária',
                                              'model'    => 'servantCompletaryData',
                                              'values'   => $workloads,
                                              'value'    => $completaryData->workload,
                                              'value_method' => 'hours',
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_textarea', ['field'    => 'observation',
                                             'label'    => 'Observação',
                                             'model'    => 'servantCompletaryData',
                                             'value'    => $completaryData->observation,
                                             'required' => false,
                                             'errors'   => $errors]) @endcomponent

    @component('components.form.input_submit',['value' => $submit, 'back_url' => route('admin.index.completary_datas', ['servant_id' => $contract->servant_id, 'id' => $contract->id])]) @endcomponent
</form>