@extends('layouts.session')
@section('title', 'SM-SEMEC Esqueceu senha')

@section('content')
              
 
            <form class="card" method="POST" action="{{ route('password.email') }}">
            @csrf                                
                 <div class="card-body p-6">
                    <div class="card-title">{{ __('Reset Password') }}</div>
                        <p class="text-muted">{{ __('Enter your email address and your password will be reset and emailed to you.') }}</p>
                         <div class="form-group">
                            <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>

                           <input id = "email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                             </div>
                  <div class="form-footer">
                  <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                   </div>
                   </div>
               </form>
               <div class="text-center text-muted">{{ __('Forget it,')}} <a href="{{ route('login') }}">{{ __('send me back') }}</a> {{ __('to the sign in screen.')}} </div>
         
@endsection
