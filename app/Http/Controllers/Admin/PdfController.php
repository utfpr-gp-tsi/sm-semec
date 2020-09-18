<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Edict;
use App\Pdf;
use App\Http\Controllers\Admin\AppController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PdfController extends AppController
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Edict $id
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $edict = Edict::find($id);
        $pdf = new PDF();
        return view('admin.edicts.pdfs.index', compact('edict', 'pdf'));
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
            'name' => 'required|max:60',
            'pdf' => 'required|mimes:pdf'
        ]);

        $pdf = new Pdf($data);
        $pdf->fill($data);
        $edict = Edict::find($id);

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.edicts.pdfs.index', compact('edict', 'pdf'))->withErrors($validator);
        }

        $edict->pdfs()->save($pdf);
        return redirect()->route('admin.index.pdf', $id)->with('success', 'PDF adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pdf  $id
     * @param  \App\Edict $edictId
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse.
     */
    public function show($edictId, $id)
    {
        $pdf = Pdf::find($id);
        $edict = Edict::find($edictId);

        $pathToFile = public_path('uploads/edicts/' . $edict->id . '/' . $pdf->getOriginal('pdf'));
        return response()->file($pathToFile);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Pdf  $id
    * @return \Illuminate\Http\RedirectResponse
    *
    */
    public function destroy($id)
    {
        $pdf = Pdf::find($id);
        $pdf->delete();
        return redirect()->route('admin.index.pdf', $pdf->edict_id)->with('success', 'PDF removido com sucesso.');
    }
}
