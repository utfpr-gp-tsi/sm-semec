@extends('layouts.admin.app')

@section('title', 'Cadastro Complementar')
@section('content')




<h3><i>Cadastro Complementar:</i></h3>


      @each('admin.servant_completary_data._completaryData_row', $completaryData, 'data')

 
 
@endsection
