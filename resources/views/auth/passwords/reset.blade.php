@extends('layouts.session')
@section('title', 'SM-SEMEC/Esqueceu senha')

@section('content')

<form class="card" action="{{route('password.update')}}" method="POST">
    @csrf

    <div class="card-body p-4">

      <div class="card-title">{{ __('Reset Password')}}</div>
      <div class="form-group">
        <label class="form-label">{{ __('E-Mail Address')}}</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email">
    </div>

    <div class="form-group">
        <label class="form-label">{{ __('Password')}}</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
   <div class="form-group">
        <label class="form-label">{{ __('New Password')}}</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password')}}</button>
          
    </div>
    </div>
</form>
@endsection
