<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\ConfirmCurrentPassword;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function edit()
    {
        $user = \Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return  \Illuminate\Http\RedirectResponse.
         */
    public function update(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        $data = $request->all();

        $validator = Validator::make($data, [
            'current_password' => new ConfirmCurrentPassword($user->password),
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->fill($data);
        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.profile.edit', compact('user'))->withErrors($validator);
            /* return redirect()->route('profile.edit')->withErrors($validator); */
        } else {
            $user->save();
            return redirect()->route('profile.edit')->with('success', 'Perfil atualizado com sucesso');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
   * @return \Illuminate\View\View
     */
    public function editPassword()
    {
        return view('admin.profile.edit_password');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return  \Illuminate\Http\RedirectResponse.
     */
    public function updatePassword(Request $request)
    {
        $user = User::find(\Auth::user()->id);

        $this->validate($request, [
            'current_password' => new ConfirmCurrentPassword($user->password),
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $password = $request->input('password');
        $user->password = Hash::make($password);
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Senha alterada com sucesso');
    }

}
