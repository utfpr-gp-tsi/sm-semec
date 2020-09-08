<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Edict;
use App\Pdf;
use App\Http\Controllers\Admin\AppController;

class PdfController extends AppController
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Edict $id
     * @return \Illuminate\View\View
     */
    public function new($id)
    {
        $edict = Edict::find($id);
        $search = Request()->term;
        $pdfs = Pdf::search($search);
        return view('admin.edicts.pdfs.new', compact('edict'))->with('pdfs', $pdfs);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edict $id
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
        return redirect()->route('admin.new.pdf', $id)->with('success', 'Pdf adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pdf  $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse.
     */
    public function show($id)
    {
        $pdf = Pdf::find($id);

        $pathToFile = public_path('uploads/edicts/' . $pdf->edict_id . '/' . $pdf->getOriginal('pdf'));
        return response()->file($pathToFile);
    }
}
