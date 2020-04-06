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
        @foreach($servants as $servants)
       <tbody>
         <tr>
           <td><a href="{{route('admin.date',$servants->id)}}">{{ $servants->servant }}</a></td>
           <td>{{ $servants->registration }}</td> 

            @foreach($servants->contracts as $contract)
             <td>{{ $contract->place }}</td>
             <td>{{ $contract->role }}</td>
            @endforeach

           <td>{{ $servants->CPF }}</td> 

           <td class="text-center">
           </td>
         </tr>
       </tbody>
        @endforeach
    </table>
  </div>
</div>

@endsection