@extends('layouts.admin.app')

@section('title', 'Servidores')

@section('content')

<div class="card-body">
   <div class="table-striped mt-3 table-responsive w-100">
     <table class="table card-table table-vcenter text-nowrap">
       <div class="col-lg-10 mb-2">
       </div>
       <thead>
         <tr>
           <th>Nome</th>
           <th>Matrícula</th>
           <th>Local de trabalho</th>
           <th>CPF</th>
           <th>Cargo</th>
           <th colspan="3"></th>
         </tr>
       </thead>
         @foreach($servant as $key => $servant)
       <tbody>
         <tr>
           <td><a href="{{route('admin.date',$servant->id)}}">{{ $servant->servant }}</a></td>
           <td>{{ $servant->registration }}</td> 
           <td>{{ $servant->contract['place'] }}</td> 
           <td>{{ $servant->CPF }}</td> 
           <td>{{ $servant->contract['role'] }}</td> 
           <td class="text-center">
           </td>
         </tr>
       </tbody>
         @endforeach
    </table>
  </div>
</div>

     @endsection
     