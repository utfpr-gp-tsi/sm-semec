<fieldset class="border p-2">
  <legend  class="w-auto">Dados do Contrato</legend>
    @component('components.form.input_text', ['field'    => 'contract_id',
                                              'label'    => 'Matricula',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $contract->registration,
                                              'required' => false,
                                              'disabled' => 'readonly',
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_text', ['field'    => 'contract_id',
                                              'label'    => 'Cargo',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $contract->role,
                                              'required' => false,
                                              'disabled' => 'readonly',
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_text', ['field'    => 'contract_id',
                                              'label'    => 'Local de Trabalho',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $contract->place,
                                              'required' => false,
                                              'disabled' => 'readonly',
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_text', ['field'    => 'contract_id',
                                              'label'    => 'Secretária',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $contract->secretary,
                                              'required' => false,
                                              'disabled' => 'readonly',
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_text', ['field'    => 'contract_id',
                                              'label'    => 'Vinculo',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $contract->link,
                                              'required' => false,
                                              'disabled' => 'readonly',
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_text', ['field'    => 'contract_id',
                                              'label'    => 'Data de Admissão',
                                              'model'    => 'servantCompletaryData',
                                              'value'    => $contract->admission_at,
                                              'required' => false,
                                              'disabled' => 'readonly',
                                              'errors'   => $errors]) @endcomponent
</fieldset>