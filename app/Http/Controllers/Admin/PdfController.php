<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Edict;
use App\Pdf;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\AppController;

class PdfController extends AppController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function new($id)
    {
        $edict = Edict::find($id);
        return view('admin.edicts.pdfs.new', compact('edict'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
     */
    public function create(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'pdf' => 'required|mimes:pdf'
        ]);

        $pdf = new Pdf($data);
        $pdf->fill($data);
        $edict = Edict::find($id);
        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.edicts.pdfs.new', compact('edict'))->withErrors($validator);
        }

        $pdf->edict_id = $edict->id;
        $pdf->save();
        return redirect()->route('admin.edicts')->with('success', 'Pdf adicionado com sucesso');
    }
}
