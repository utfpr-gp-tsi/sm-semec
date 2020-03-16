@extends('layouts.admin.app')

@section('title', 'Administradores')

@section('content')


<div class="card-body">
		  <div>
</div>

		  
<div class="text-right mt-3">
  
</div>

<div class="table-striped mt-3 table-responsive w-100">
  <table class="table card-table table-vcenter text-nowrap">
  	 <div class="d-flex " >
  	<a  class="btn btn-outline-primary ml-auto" href="/admin/registerUsers" > <i class="fas fa-plus"></i> Novo Servidor</a>
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
           <td>{{$user->created_at}}</td>
           <td class="text-center"><i class="far fa-edit"></i> <a href="{{route('users.destroy', $user->id)}}"><i class="far fa-trash-alt"></i></td></a>
          

      </tr>
      
    </tbody>
    @endforeach
  </table>
</div>
</div>
	 @endsection