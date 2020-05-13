<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AppController;
use App\Services\DateFormatter;

class EdictsController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     *  
     */
    public function index()
    {
        return view('admin.edicts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function new()
    {
        return view('admin.edicts.new');
    }
}