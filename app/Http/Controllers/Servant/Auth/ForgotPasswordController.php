<?php

namespace App\Http\Controllers\Servant\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;
use Auth;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;


    /**
     * Only guests for "servant" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:servant');
    }


    /**
     * Show the reset email form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email', [
            'loginRoute' => 'servant.login',
            'passwordEmailRoute' => 'servant.password.email'
        ]);
    }

    /**
    * password broker for servant guard.
    *
    * @return \Illuminate\Contracts\Auth\PasswordBroker
    */
    public function broker()
    {
        return Password::broker('servants');
    }

    /**
     * Get the guard to be used during authentication
     * after password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard()
    {
        return Auth::guard('servant');
    }
}
