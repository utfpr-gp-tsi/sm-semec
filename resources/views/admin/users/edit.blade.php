@extends('layouts.admin.app')

@section('title', 'Editar Administrador')

@section('content')

<form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data" novalidate>
    @method('patch')
    @csrf

     @component('components.form.input_name',['field'  => 'name',
                       'label'  => 'Nome',
                       'model'  => 'user',
                       'value'  => $user->name,
                       'errors' => $errors]) @endcomponent

  
      @component('components.form.input_email',['field'  => 'email',
                        'label'  => 'Email',
                        'model'  => 'user',
                        'value'  => $user->email,
                        'errors' => $errors]) @endcomponent

    
  
    
    @component('components.form.input_submit',['value' => 'Editar Administrador', 'route' => '/admin/users']) @endcomponent
</form>
@endsection