<?php

namespace App\Http\Controllers\Servant;

use Illuminate\Support\Facades\Validator;
use App\Models\Edict;
use App\Models\Pdf;
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
        return view('servant.edicts.index_edicts_open')->with('edicts', $edicts);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function indexClose()
    {
        $search = Request()->term;
        $edicts = Edict::searchClose($search);
        return view('servant.edicts.index_edicts_close')->with('edicts', $edicts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edict  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $edict = Edict::find($id);
        return view('servant.edicts.show', [
            'edict' => $edict,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edict $id
     * @param  \App\Models\Pdf $pdfId
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse.
    * @SuppressWarnings("unused")
     */
    public function showPdf($id, $pdfId)
    {
        $pdf = Pdf::find($pdfId);
        return response()->file($pdf->pathToFile());
    }
}
