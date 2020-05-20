<?php

namespace App\Http\Controllers\Servant;

use Illuminate\Http\Request;
use App\Http\Controllers\Servant\AppServantController;

class HomeServantController extends AppServantController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('servant.home.index');
    }
}
