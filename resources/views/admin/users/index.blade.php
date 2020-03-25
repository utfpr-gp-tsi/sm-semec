@extends('layouts.admin.app')

@section('title', 'Administradores')

@section('content')


   <div class="table-striped mt-3 table-responsive">
     <table class="table card-table table-vcenter ">
  	   <div class="col-lg-10 mb-2">
         <div class="input-group">
            <input type="text" class="form-control" placeholder="Procurar...">
              <span class="input-group-append">
                <a class="btn btn-outline-info" >
                  <i class="fas fa-search"></i>
                </a>
                <a  class="btn btn-outline-primary col-lg-12 ml-5 " href="/admin/users/new" > 
                  <i class="fas fa-plus"></i> 
                       Novo Servidor
                </a>
              </span>
          </div>
       </div>
       <thead>
         <tr>
           <th>Nome</th>
           <th>Email</th>
           <th>Criado em</th>
           <th ></th>
         </tr>
       </thead>
         @foreach($users as $key => $user)
       <tbody>
         <tr>
           <td><a href="{{route('users.show', $user->id)}}">{{ $user->name }}</a></td> 
           
          
           <td>{{ $user->email }}</td> 
           <td>{{$user->dateFormat($user->created_at)}}</td>
           <td >
              @component('components.form.method_delete',['url' => route('users.destroy', $user->id)]) @endcomponent
              @component('components.form.method_edit',['url' => route('users.edit', $user->id)]) @endcomponent
           </td>
         </tr>
       </tbody>
         @endforeach
    </table>
  </div>
  

	 @endsection