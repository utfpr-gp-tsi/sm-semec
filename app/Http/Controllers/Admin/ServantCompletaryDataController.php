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
use App\Models\Unit;

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
        return view('admin.servant_completary_data.index', [
            'servant' => $servant,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Servant $servantId
     * @param  \App\Models\Contract $id
     * @return \Illuminate\View\View
    * @SuppressWarnings("unused")
     */
    public function indexCompletaryData($servantId, $id)
    {
        $contract = Contract::find($id);
        $completaryData = $contract->servantCompletaryData;

        return view('admin.servant_completary_data.completary_datas', [
            'contract' => $contract,
            'completaryData' => $completaryData]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\View\View
     * @param  \App\Models\Servant $servantId
     * @param  \App\Models\Contract $id
    * @SuppressWarnings("unused")
    */
    public function new($servantId, $id)
    {
        $contract = Contract::find($id);
        $completaryData = new ServantCompletaryData();
        $workloads = Workload::all();

        return view('admin.servant_completary_data.new', [
            'completaryData' => $completaryData,
            'contract' => $contract,
            'workloads' => $workloads]);
    }

    /**
    * Store a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $request
    * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
    * @param  \App\Models\Contract $id
    * @param  \App\Models\Servant $servantId
    * @SuppressWarnings("unused")
    */
    public function create(Request $request, $servantId, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'formation'   => 'required',
            'workload_id' => 'required',
        ]);

        $completaryData = new ServantCompletaryData($data);
        $contract = Contract::find($id);

        $workloads = Workload::all();

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.servant_completary_data.new', [
                'completaryData' => $completaryData,
                'contract' => $contract,
                'workloads' => Workload::all()])->withErrors($validator);
        }

        $contract->servantCompletaryData()->save($completaryData);

        return redirect()->route('admin.index.completary_datas', ['servant_id' => $contract->servant_id, 'id' =>
            $contract->id])->with('success', 'Cadastro Complementar adicionado com sucesso');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Contract $contractId
    * @param  \App\Models\ServantCompletaryData $id
    * @param  \App\Models\Servant $servantId
    * @return  \Illuminate\View\View
    * @SuppressWarnings("unused")
    */
    public function edit($servantId, $contractId, $id)
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
    * @param  \Illuminate\Http\Request $request
    * @param  \App\Models\Contract $contractId
    * @param  \App\Models\Servant $servantId
    * @param  \App\Models\ServantCompletaryData $id
    * @return \Illuminate\View\View | \Illuminate\Http\RedirectResponse
    * @SuppressWarnings("unused")
    */
    public function update(Request $request, $servantId, $contractId, $id)
    {
        $contract = Contract::find($contractId);
        $completaryData = $contract->servantCompletaryData;

        $workloads = Workload::all();

        $data = $request->all();

        $validator = Validator::make($data, [
        'formation' => "required",
        'workload_id' => "required",
        ]);

        $completaryData->fill($data);

        if ($validator->fails()) {
                $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
                return view('admin.servant_completary_data.edit', compact('completaryData', 'contract', 'workloads'))
                ->withErrors($validator);
        }

        $contract->servantCompletaryData()->save($completaryData);
        return redirect()->route('admin.index.completary_datas', ['servant_id' => $servantId, 'id' => $contractId])
        ->with('success', 'Cadastro Complementar atualizado com sucesso');
    }
}
