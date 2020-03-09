<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.profile.edit");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.profile.edit_password', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request = Request();
        $password = $request->input('password');
         $dados = $request->all();
        if(Hash::check($dados['password'], $user->password)){
            $user->updateProfile($id);
        return redirect()->route('edit',[$user])->with('success', 'Perfil atualizado com sucesso');
        }
        return redirect()->route('edit', [$user])->with('fail','Senha atual incorreta');

    }

     public function update_password(Request $request, $id)
    {
        $this->validate($request, [
          'password' => 'required|min:6|confirmed',
          'password_confirmation' => 'required|min:6',
        ]);


        $current_password = $request->input('current_password');

        $password_confirm = $request->input('password_confirmation');
        $user = User::find($id);
        $password = $request->input('password');
        $dados = $request->all();
        
        if(Hash::check($current_password, $user->password)){
           
            if($password == $password_confirm){
               $user->updateProfile($id);
               return redirect()->route('password', [$user])->with('success', 'Senha alterada com sucesso');
           }
       }
       return redirect()->route('password', [$user])->with('fail','As senhas não correspondem');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
