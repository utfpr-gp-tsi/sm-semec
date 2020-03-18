<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Hash;

class UsersController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       
        return view('admin.users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required |email|unique:users,email',
            'image' => 'nullable',
            'password' => 'required',
        ]);

        $user = new User([
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'password' => $request->get('password'),
           

        ]);
          
          $users = $request->all();
          $users['password'] = Hash::make($users['password']);
         
 
        $user->save();
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $id
     * @return  \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        
        $user = User::find($id);

        if ($user) {
            $data = $request->all();
       
            $user->update($data);
            return redirect()->route('users.show', $user->id)->with('success', 'Administrador atualizado com sucesso');
        }
        return redirect()->route('users')->with('danger', 'Não foi possível atualizar esse administrador.');
    }

        

      
            
        
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();

            return redirect()->route('users')->with('success', 'Administrador removido com sucesso.');
        }
        return redirect()->route('users')->with('danger', 'Administrador indisponível.');
    }
}
