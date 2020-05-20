<?php

namespace App\Http\Controllers\Servant;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AppServantController;
use App\Servant;

class ServantsServantController extends AppServantController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     * @param  string $search
     */
    public function index($search = null)
    {
        $servants = Servant::search($search);
        return view('servant.servants.index', compact('servants'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $servant = Servant::find($id);
        return view('servant.servants.show', compact('servant'));
    }
}
