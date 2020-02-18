@extends('layouts.session')
@section('content')
<form class="card" action="{{route('login')}}" method="POST">
    @csrf
    <div class="card-body p-6">
      <div class="card-title">{{ __('Login to your account')}}</div>
      <div class="form-group">
        <label class="form-label">{{ __('E-Mail Address')}}</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email">
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('Password')}}</label>
        <input type="password" class="form-control" id="exampleInputPassword1"name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label class="custom-control custom-checkbox">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <span class="form-check-label remember" for="remember">
            {{ __('Remember Me')}}
        </span>
        
    </label>
</div>
<div class="form-footer">
    <button type="submit" class="btn btn-primary btn-block">{{ __('Login')}}</button>
</div>
<a href="{{ route('password.request')}}" class="float-right senha">{{ __('I forgot password')}}</a>
</div>
</form>
@endsection