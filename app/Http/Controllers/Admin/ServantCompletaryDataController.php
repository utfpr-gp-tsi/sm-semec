<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AppController;
use App\Models\ServantCompletaryData;
use App\Models\Contract;
use App\Models\Workload;
use App\Models\Servant;

class ServantCompletaryDataController extends AppController
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Contract $id
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $servant =  Servant::find($id);

        $completaryData = ServantCompletaryData::with(['moviments.role', 'moviments.unit', 'moviments'
        => function ($query) {
            $query->orderBy('started_at', 'desc');
        }])->get()->find($servant->contracts[0]->servantCompletaryData);

        return view('admin.servant_completary_data.index', compact('servant', 'completaryData'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\View\View
     * @param  \App\Models\Contract $id
     * @param  \App\Models\Contract $servantId
    */
    public function new($id, $servantId)
    {
        $contract = Contract::find($servantId);
        $workloads = Workload::all();
        $completaryData = new ServantCompletaryData();
        
        return view('admin.servant_completary_data.new', compact('completaryData', 'contract', 'workloads'));
    }

    /**
    * Store a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $request
    * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
    * @param  \App\Models\Contract $servantId
    * @param  \App\Models\Contract $id
    */
    public function create(Request $request, $id, $servantId)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'period' => 'required',
            'occupation' => 'required',
            'contract_id' => 'required',
            'workload_id' => 'required'
        ]);

        $completaryData = new ServantCompletaryData($data);
        $contract = Contract::find($servantId);
        $workloads = Workload::all();

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.servant_completary_data.new', compact('completaryData', 'contract', 'workloads'))
            ->withErrors($validator);
        }

        $contract->servantCompletaryData()->save($completaryData);

        return redirect()->route('admin.index.completary_data', $id)
        ->with('success', 'Cadastro Complementar adicionado com sucesso');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\ServantCompletaryData  $servantId
    * @param  \App\Models\ServantCompletaryData  $id
    * @param  \App\Models\ServantCompletaryData  $contractId
    * @return  \Illuminate\View\View
    */
    public function edit($id, $servantId, $contractId)
    {
        $completaryData = ServantCompletaryData::find($contractId);
        $contract = $completaryData->contract;
        $workloads = Workload::all();
        
        return view('admin.servant_completary_data.edit', compact('completaryData', 'contract', 'workloads'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\ServantCompletaryData  $servantId
    * @param  \App\Models\ServantCompletaryData  $id
    * @param  \App\Models\ServantCompletaryData  $contractId
    * @return \Illuminate\View\View | \Illuminate\Http\RedirectResponse
    */
    public function update(Request $request, $id, $servantId, $contractId)
    {
        $completaryData = ServantCompletaryData::find($contractId);
        $contract = $completaryData->contract;
        $workloads = Workload::all();

        $data = $request->all();

        $validator = Validator::make($data, [
            'period' => "required",
            'occupation' => 'required',
            'contract_id' => 'required',
            'workload_id' => "required",
        ]);

        $completaryData->fill($data);

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.servant_completary_data.edit', compact('completaryData', 'contract', 'workloads'))
            ->withErrors($validator);
        }

        $contract->servantCompletaryData()->save($completaryData);
        return redirect()->route('admin.index.completary_data', $id)
        ->with('success', 'Cadastro Complementar atualizado com sucesso');
    }
}
