@extends('layouts.admin.app')

@section('title', 'Administradores')

@section('content')

<div class="card-body">
   <div class="table-striped mt-3 table-responsive w-100">
     <table class="table card-table table-vcenter text-nowrap">
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
           <th colspan="3"></th>
         </tr>
       </thead>
         @foreach($users as $key => $user)
       <tbody>
         <tr>
           <td><a href="{{route('users.show', $user->id)}}">{{ $user->name }}</a></td> 
           <td>{{ $user->email }}</td> 
           <td>{{ date( 'd/m/Y', strtotime($user->created_at))}}</td>
           <td class="text-center">
              <form action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{route('users.edit', $user->id)}}" title="Editar">
                   <i class="far fa-edit"></i> 
                </a> 
                <a href="" title="Excluir"><button class="btn"  type="submit"><i class="far fa-trash-alt"></i></button></a>
              </form>
           </td>
         </tr>
       </tbody>
         @endforeach
    </table>
  </div>
</div>

	 @endsection