<form action="{{ $route }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method($method)
    @component('components.form.input_text', ['field'    => 'title',
                                              'label'    => 'Título',
                                              'model'    => 'edict',
                                              'value'    => $edict->title,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent
    
    @component('components.form.input_text', ['field'    => 'description',
                                              'label'    => 'Descrição',
                                              'model'    => 'edict',
                                              'value'    => $edict->description,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent
    
    @component('components.form.input_date', ['field'    => 'started_at',
                                              'label'    => 'Início',
                                              'model'    => 'edict',
                                              'value'    => $edict->started_at,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

    @component('components.form.input_date', ['field'    => 'ended_at',
                                              'label'    => 'Término',
                                              'model'    => 'edict',
                                              'value'    => $edict->ended_at,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent
                                             

    

    @component('components.form.input_submit',['value' => $submit, 'back_url' => route('admin.users')]) @endcomponent


</form>