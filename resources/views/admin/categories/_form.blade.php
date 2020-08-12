<form action="{{ $route }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method($method)
    @component('components.form.input_text', ['field'    => 'name',
                                              'label'    => 'Nome da Categoria',
                                              'model'    => 'UnitCategory',
                                              'value'    => $category->name,
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent
@component('components.form.input_submit',['value' => $submit, 'back_url' => route('admin.categories')]) @endcomponent
</form>