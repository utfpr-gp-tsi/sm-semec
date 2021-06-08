<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Edict;
use App\Models\Pdf;

class EdictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
    */
    public function index()
    {
        $edicts = Edict::orderBy('started_at', 'desc')->get()->groupBy(function ($item) {
            return $item->started_at->format('Y');
        });

        return view('edicts.index', compact('edicts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edict $id
     * @param  \App\Models\Pdf $pdfId
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse.
     */
    public function showPdf($id, $pdfId)
    {
        $edict = Edict::find($id);
        $pdf = $edict->pdfs->find($pdfId);
        return response()->file($pdf->pathToFile());
    }
}
