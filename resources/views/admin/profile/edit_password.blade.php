@extends('layouts.admin.app')
@section('title', 'Modificar Senha')

@section('content')

<form  action="{{route('password.update', Auth::user()->id)}}" method="POST">
    @csrf
    <div class="form-group">
        <label class="form-label">{{ __('Current Password')}}</label>
        <input id="password" type="password" class="form-control " name="current_password"  required autofocus="">
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('New Password')}}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('Confirm Password')}}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
    <div class="form-footer">
        <div class="d-flex">
            <a class="btn btn-secondary" href="/admin">Voltar</a>
            <input type="submit" value="Alterar Senha" class="btn btn-primary ml-auto" data-disable-with="Alterar Senha" />
        </div> 
    </div>
</form>
@endsection
