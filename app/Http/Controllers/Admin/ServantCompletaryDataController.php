<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AppController;
use App\Models\ServantCompletaryData;
use App\Models\Contract;
use App\Models\Workload;
use App\Models\Servant;
use App\Models\Movement;

class ServantCompletaryDataController extends AppController
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Servant $id
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $servant =  Servant::find($id);

        $servantCompletaryData = $servant->contracts->first()->servantCompletaryData;

        $completaryData = ServantCompletaryData::with(['moviments.role', 'moviments.unit', 'moviments'
            => function ($query) {
                $query->orderBy('started_at', 'desc');
            }])->get()->find($servantCompletaryData);

        return view('admin.servant_completary_data.index', [
            'servant' => $servant,
            'completaryData' => $completaryData
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\View\View
     * @param  \App\Models\Servant $id
     * @param  \App\Models\Contract $contractId
    */
    public function new($id, $contractId)
    {
        $contract = Contract::find($contractId);
        
        $completaryData = new ServantCompletaryData();

        return view('admin.servant_completary_data.new', [
            'completaryData' => $completaryData,
            'workloads' => Workload::all(),
            'contract' => $contract,
        ]);
    }

    /**
    * Store a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $request
    * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
    * @param  \App\Models\Contract $contractId
    * @param  \App\Models\Servant $id
    */
    public function create(Request $request, $id, $contractId)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'period' => 'required',
            'occupation' => 'required',
            'contract_id' => 'required',
            'workload_id' => 'required'
        ]);

        $completaryData = new ServantCompletaryData($data);
        $contract = Contract::find($contractId);
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
    * @param  \App\Models\Contract  $contractId
    * @param  \App\Models\ServantCompletaryData  $id
    * @return  \Illuminate\View\View
    */
    public function edit($id, $contractId)
    {
        $contract = Contract::find($contractId);
        $completaryData = $contract->servantCompletaryData;

        return view('admin.servant_completary_data.edit', [
            'completaryData' => $completaryData,
            'workloads' => Workload::all(),
            'contract' => $contract,
        ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Contract  $contractId
    * @param  \App\Models\ServantCompletaryData  $id
    * @return \Illuminate\View\View | \Illuminate\Http\RedirectResponse
    */
    public function update(Request $request, $id, $contractId)
    {
        $contract = Contract::find($contractId);
        $completaryData = $contract->servantCompletaryData;

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
