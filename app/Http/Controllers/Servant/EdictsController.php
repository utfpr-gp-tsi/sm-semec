<?php

namespace App\Http\Controllers\Servant;

use Illuminate\Support\Facades\Validator;
use App\Edict;
use Illuminate\Http\Request;
use App\Http\Controllers\Servant\AppController;


class EdictsController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */


    public function indexOpen()
    {
        $search = Request()->term;
        $edicts = Edict::searchOpen($search);
        return view ('servant.edicts.index_open')->with('edicts', $edicts);
        
    }

    public function indexClose()
    {
        $search = Request()->term;
        $edicts = Edict::searchClose($search);
        return view ('servant.edicts.index_close')->with('edicts', $edicts);
        
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
        return view('servant.edicts.show', compact('edict'));
    }



}
