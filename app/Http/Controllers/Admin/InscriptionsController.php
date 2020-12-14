<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AppController;
use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Edict;

class InscriptionsController extends AppController
{
    /**
    * Display a listing of the resource.
    * @param  \App\Models\Edict  $id
    * @return \Illuminate\View\View
    */
    public function index($id)
    {
        $edict = Edict::find($id);

        return view('admin.inscription.index', [
         'edict' => $edict]);
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Edict  $id
    * @param  \App\Models\Inscription  $inscriptionId
    * @SuppressWarnings("unused")
    * @return \Illuminate\View\View
    */
    public function show($id, $inscriptionId)
    {
        $inscription = Inscription::find($inscriptionId);

        return view('admin.inscription.show', [
            'inscription' => $inscription]);
    }
}
