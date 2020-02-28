@extends('layouts.session')
@section('title', 'SEMEC | Login')


@section('content')

<form class="card" action="{{route('login')}}" method="POST">
    @csrf

    <div class="card-body p-4">

      <div class="card-title">{{ __('Login to your account')}}</div>
      <div class="form-group">
        <label class="form-label">{{ __('E-Mail Address')}}</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email">
    </div>

    <div class="form-group">
        <label class="form-label">{{ __('Password')}}</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label class="custom-control custom-checkbox">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <span class="form-check-label remember ml-1" for="remember">
            {{ __('Remember Me')}}
        </span>

    </label>
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Login')}}</button>
          @if (Route::has('password.request'))
        <a class="btn-link float-right" href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }} </a>
         @endif
    </div>
    </div>
</form>
@endsection
