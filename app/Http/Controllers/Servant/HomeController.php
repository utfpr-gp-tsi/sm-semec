<?php

namespace App\Http\Controllers\Servant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Servant\AppController;

class HomeController extends AppController
{
    public function index()
    {
        return view('servant.home.index');
    }
}
