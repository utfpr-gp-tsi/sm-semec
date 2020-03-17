@extends('layouts.admin.app')

@section('title', 'Administrador')

@section('content')

<div class="row">
  <div class="card">
      <div class="card-body">
          <img class="card-profile-img mt-1" src="{{ $user->image }}">
              <label class="form-label">Nome: <p>{{ $user->name }}</p></label> 
              <label class="form-label">Email: <p>{{ $user->email }}</p></label>
              <label class="form-label">Criado em: <p>{{ date( 'd/m/y H:i' , strtotime($user->created_at))}}</p> </label>
              <label class="form-label">Atualizado em:<p>{{ date( 'd/m/y H:i' , strtotime($user->updated_at))}}</p> </label>
                    
      </div>
  </div>

</div>  
<form action="{{ route('users.edit', $user->id) }}" method="get">
    @component('components.form.input_submit',['value' => 'Editar Administrador', 'route' => '/admin/users']) @endcomponent
 </form>

@endsection