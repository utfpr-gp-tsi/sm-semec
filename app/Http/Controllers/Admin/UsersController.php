<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\AppController;

use Illuminate\Http\Request;
use Hash;

class UsersController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $users = User::latest()->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.users.register');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required |email|unique:users,email',
            'image' => 'nullable',
            'password'=>'required',
        ]);

        $user = new User([
           'name' =>$request->get('name'),
           'email' =>$request->get('email'),
          // 'image' => $request->get('image'),
           'password'=>$request->get('password'),
           

        ]);
          
          $users = $request->all();
          $users['password'] = Hash::make($users['password']);
         
 
    $user->save();
       return redirect('/admin');
       
}

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'Administrador removido com sucesso.');
    }
}
