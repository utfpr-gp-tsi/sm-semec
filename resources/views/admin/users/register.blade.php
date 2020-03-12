@extends('layouts.admin.app')

@section('title', 'Novo usuário')

@section('content')

<form action="{{route('users.register')}}" method="post" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="form-group string ">
        <label class="form-control-label" >Nome <abbr title="obrigatório">*</abbr>
        </label>
        <input class="form-control" autofocus="autofocus" required="required"  type="text" name="name" id="name" />
    </div>
    <div class="form-group email">
        <label class="form-control-label email" >Email <abbr title="obrigatório">*</abbr>
        </label>
        <input class="form-control" type="text" name="email" id="email" />
    </div>
    <div class="form-group ">
        <label class="form-control-label string required" >Senha<abbr title="obrigatório">*</abbr>
        </label>
        <input class="form-control"  type="password"  name="password" id="password" />
    </div>
    <div class="form-footer">
       <div class="d-flex">
         <a class="btn btn-secondary" href="">Voltar</a>
         <input type="submit"  value="Criar usuário" class="btn btn-primary ml-auto " />
       </div>
    s</div>
      
</form>
@endsection