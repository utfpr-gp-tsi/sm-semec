<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Edict;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AppController;
use App\Services\DateFormatter;

class EdictsController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     *  
     */
    public function index($search = null)
    {
        $edicts = Edict::search($search);
        return view('admin.edicts.index',compact('edicts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function new()
    {
        $edict = new Edict();
        return view('admin.edicts.new', compact('edict'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
       */
      public function create(Request $request)
      {
          $data = $request->all();
          $edict = new Edict($data);
  
          $validator = Validator::make($data, [
              'name'        => 'required',
              'description' => 'required',
              'started_at'  => 'required',
               'ended_at'   => 'required',
          ]);
  
          if ($validator->fails()) {
              $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
              return view('admin.edicts.new', compact('edict'))->withErrors($validator);
          }
  
          $edict->save();
          return redirect()->route('admin.edicts')->with('success', 'Edital cadastrado com sucesso');
      }

      /**
     * Display the specified resource.
     *
     * @param  \App\Edict  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $edict =  Edict::find($id);
        return view('admin.edicts.show', compact('edict'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edict  $id
     * @return  \Illuminate\View\View
     */ 
    public function edit($id)
    {
        $edict = Edict::find($id);
        return view('admin.edicts.edit', compact('edict'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edict  $id
     * @return \Illuminate\View\View | \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id)
    {
        $edict = Edict::find($id);
        $data = array_filter($request->all());

        $validator = Validator::make($data, [
            'name'     => 'required',
            'description'    => 'required',
            'started_at'  => 'required',
            'ended_at'   => 'required',
        ]);

        $edict->fill($data);
        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.edicts.edit', compact('edict'))->withErrors($validator);
        }

        $edict->save();
        return redirect()->route('admin.edicts')->with('success', 'Edital atualizado com sucesso');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edict  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function destroy($id)
    {
        $edict = Edict::find($id);
        $edict->delete();
        return redirect()->route('admin.edicts')->with('success', 'Edital removido com sucesso.');
    }




}