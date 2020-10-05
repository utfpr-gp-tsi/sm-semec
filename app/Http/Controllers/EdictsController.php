<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Edict;
use App\Pdf;

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
     * @param  \App\Pdf  $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse.
     */
    public function showPdf($edictId, $id)
    {
        $pdf = Pdf::find($id);
        return response()->file($pdf->pathToFile());
    }
}
