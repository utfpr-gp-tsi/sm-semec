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
    * @param  \App\Models\Edict $id
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
    * @param  \App\Models\Edict $edictId
    * @param  \App\Models\Inscription $id
    * @SuppressWarnings("unused")
    * @return \Illuminate\View\View
    */
    public function show($edictId, $id)
    {
        $inscription = Inscription::find($id);

        return view('admin.inscription.show', [
            'inscription' => $inscription]);
    }
}
