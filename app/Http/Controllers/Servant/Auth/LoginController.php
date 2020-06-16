<?php

namespace App\Http\Controllers\Servant\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Auth\Hash;
use App\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    /**
    * Only guests for "admin" guard are allowed except
    * for logout.
    *
    *@return void
    */
    public function __construct()
    {
        $this->middleware('guest:servant')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login', [
            'loginRoute' => 'servant.login',
            'forgotPasswordRoute' => 'servant.password.request',
        ]);
    }

    public function login(Request $request)
    {
        $userData = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password'),
        );

        if (!Auth::guard('servant')->attempt($userData)) {
            return redirect('servant/login')->with('fail', 'Usuário ou senha incorretas.');
        }

        return redirect('servant')->with('success', 'Login efetuado com sucesso.');
    }

    public function logout()
    {
        Auth::guard('servant')->logout();
        return redirect()->route('servant.login');
    }
}
