@extends('layouts.admin.app')

@section('title', 'Novo Administrador')

@section('content')

<form action="{{route('users.register')}}" method="post" enctype="multipart/form-data" novalidate>
    @csrf
    @component('components.form.input_name',['field'  => 'name',
                       'label'  => 'Nome',
                       'model'  => 'user',
                       'errors' => $errors]) @endcomponent
      
    @component('components.form.input_email',['field'  => 'email',
                        'label'  => 'Email',
                        'model'  => 'user',
                        'errors' => $errors]) @endcomponent
    
    @component('components.form.input_password',['field' => 'password',
                                                        'label' => 'Senha',
                                                        'model' => 'user',
                                                        'errors' => $errors])
            @endcomponent
    
    @component('components.form.input_submit',['value' => 'Criar Administrador', 'route' => '/admin/users']) @endcomponent
</form>
@endsection