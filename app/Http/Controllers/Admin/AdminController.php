<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
   * @return \Illuminate\View\View
     */
    public function editPassword($id)
    {
        $user = User::find($id);
        return view('admin.profile.edit_password', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return  \Illuminate\Http\RedirectResponse.
         */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request = Request();
        $dados = $request->all();
        if (Hash::check($dados['password'], $user->password)) {
            $user->updateProfile($id);
            return redirect()->route('edit', [$user])->with('success', 'Perfil atualizado com sucesso');
        }
        return redirect()->route('edit', [$user])->with('fail', 'Senha atual incorreta');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return  \Illuminate\Http\RedirectResponse.
         */
    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
          'password' => 'required|min:6|confirmed',
          'password_confirmation' => 'required|min:6',
        ]);

        $currentPassword = $request->input('current_password');
        $passwordConfirm = $request->input('password_confirmation');
        $user = User::find($id);
        $password = $request->input('password');
        
        if (Hash::check($currentPassword, $user->password)) {
            if ($password == $passwordConfirm) {
                $user->updateProfile($id);
                 return redirect()->route('password', [$user])->with('success', 'Senha alterada com sucesso');
            }
        }
        return redirect()->route('password', [$user])->with('fail', 'As senhas não correspondem');
    }
}
