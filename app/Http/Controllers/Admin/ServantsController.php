<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AppController;
use App\Servant;

class ServantsController extends AppController
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
        return view('admin.servants.index', compact('servants'));
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
        return view('admin.servants.show', compact('servant'));
    }
}
