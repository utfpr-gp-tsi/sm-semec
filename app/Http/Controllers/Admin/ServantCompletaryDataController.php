<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AppController;
use App\Models\ServantCompletaryData;
use App\Models\Contract;
use App\Models\Workload;

class ServantCompletaryDataController extends AppController
{

    public function index($id, $servant_id)
    {
        $contract = Contract::find($servant_id);
        $completaryData = ServantCompletaryData::find($contract);

        // dd($completaryData);exit();

        //dd($completaryData->contract);exit();
        return view('admin.servant_completary_data.index', compact('completaryData', 'contract'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\View\View
    */
    public function new($id, $servant_id)
    {
    	$contract = Contract::find($servant_id);
        $workloads = Workload::all();
        $completaryData = new ServantCompletaryData();
        return view('admin.servant_completary_data.new', compact('completaryData', 'contract', 'workloads'));
    }

    /**
    * Store a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $request
    * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
    */
    public function create(Request $request, $id, $servant_id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'period' => 'required',
            'occupation' => 'required',
            'contract_id' => 'required',
            'workload_id' => 'required'
        ]);

        $completaryData = new ServantCompletaryData($data);        
        $contract = Contract::find($servant_id);
        $workloads = Workload::all();

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.servant_completary_data.new',  compact('completaryData', 'contract', 'workloads'))->withErrors($validator);
        }

        $contract->servantCompletaryData()->save($completaryData);

        return redirect()->route('admin.servants')->with('success', 'Cadastro Complementar adicionado com sucesso');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\ServantCompletaryData  $id
    * @return  \Illuminate\View\View
    */
    public function edit($id, $servant_id, $contract_id)
    {
        $completaryData = ServantCompletaryData::find($contract_id);
        $contract = Contract::find($servant_id);
        $workloads = Workload::all();
        
        return view('admin.servant_completary_data.edit', compact('completaryData', 'contract', 'workloads'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\ServantCompletaryData  $id
    * @return \Illuminate\View\View | \Illuminate\Http\RedirectResponse
    */
    public function update(Request $request, $id, $servant_id, $contract_id)
    {
        $completaryData = ServantCompletaryData::find($contract_id);
        $contract = Contract::find($servant_id);
        $workloads = Workload::all();

        $data = array_filter($request->all());

        $validator = Validator::make($data, [
            'period' => "required",
            'occupation' => 'required',
            'contract_id' => 'required',
            'workload_id' => "required",
        ]);

        $completaryData->fill($data);
        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.servant_completary_data.edit', compact('completaryData', 'contract', 'workloads'))->withErrors($validator);
        }

        $completaryData->save();
        return redirect()->route('admin.servants')->with('success', 'Cadastro Complementar atualizado com sucesso');
    }

    // public function index()
    // {
    //     $completaryData = ServantCompletaryData::all();
    //     $contract = Contract::all();
    //     return view('admin.servant_completary_data.index', compact('completaryData', 'contract'));
    // }
}
