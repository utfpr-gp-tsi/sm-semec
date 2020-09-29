<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Edict;
use App\Pdf;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
    */
    public function listEdicts()
    {
        $edicts = Edict::all();

        $edicts = Edict::orderBy('started_at')->get()->groupBy(function ($item) {
            return $item->started_at->format('Y');
        });
  
        return view('home.edicts.list', compact('edicts'));
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
}
