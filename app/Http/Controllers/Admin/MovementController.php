<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AppController;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Movement;
use App\Models\Unit;
use Illuminate\Support\Facades\Validator;
use App\Models\ServantCompletaryData;

class MovementController extends AppController
{
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\View\View
     * @param  \App\Models\Servant $servantId
     * @param  \App\Models\Contract $contractId
     * @param  \App\Models\ServantCompletaryData $id
     * @SuppressWarnings("unused")
    */
    public function new($servantId, $contractId, $id)
    {
        $contract = Contract::find($id);
        $movement = new Movement();
        $completaryData = ServantCompletaryData::find($id);
        
        return view('admin.servant_completary_data.movements.new', [
            'contract' => $contract,
            'units' => Unit::all(),
            'movement' => $movement,
            'completaryData' => $completaryData]);
    }

    /**
    * Store a newly created resource in storage.
    * @param  \Illuminate\Http\Request  $request
    * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
    * @param  \App\Models\Contract $contractId
    * @param  \App\Models\Servant $servantId
    * @param  \App\Models\ServantCompletaryData $id
    * @SuppressWarnings("unused")
    */
    public function create(Request $request, $servantId, $contractId, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'occupation' => 'required',
            'period' => 'required',
            'unit_id' => 'required',
            'started_at'  => 'required|date_format:d/m/Y H:i',
        ]);
        $this->filterDateTimeFormat($data, ['started_at', 'ended_at']);

        $completaryData = ServantCompletaryData::find($id);

        $movement = new Movement($data);

        $units = Unit::all();

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('admin.servant_completary_data.movements.new', [
                'movement' => $movement,
                'units' => Unit::all(),
                'completaryData' => $completaryData])->withErrors($validator);
        }
        
        $completaryData->moviments()->save($movement);

        return redirect()->route('admin.index.completary_datas', ['servant_id' => $completaryData->contract->servant_id,
            'id' => $completaryData->contract_id])->with('success', 'Movimentação adicionada com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movement $id
     * @return  \Illuminate\View\View
     * @param  \App\Models\ServantCompletaryData $completaryDataId
     * @param  \App\Models\Contract $contractId
     * @param  \App\Models\Servant $servantId
     * @SuppressWarnings("unused")
     */
    public function edit($servantId, $contractId, $completaryDataId, $id)
    {
        $movement = Movement::find($id);
        $completaryData = ServantCompletaryData::find($completaryDataId);
        $units = Unit::all();

        return view('admin.servant_completary_data.movements.edit', [
            'movement' => $movement,
            'completaryData' => $completaryData,
            'units' => $units]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  \App\Models\Contract $contractId
    * @param  \App\Models\Servant $servantId
    * @param  \App\Models\Movement $id
    * @param  \App\Models\ServantCompletaryData $completaryDataId
    * @return \Illuminate\View\View | \Illuminate\Http\RedirectResponse
    * @SuppressWarnings("unused")
    */
    public function update(Request $request, $servantId, $contractId, $completaryDataId, $id)
    {
        $data = $request->all();
     
        $movement = Movement::find($id);
        $completaryData = ServantCompletaryData::find($completaryDataId);
        $units = Unit::all();
        $contract = Contract::find($contractId);

        $validator = Validator::make($data, [
        'occupation' => "required",
        'period' => 'required',
        'unit_id' => "required",
        'started_at'  => 'required|date_format:d/m/Y H:i',
        ]);

        $movement->fill($data);

        if ($validator->fails()) {
                $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
                return view('admin.servant_completary_data.movements.edit', [
                    'completaryData' => $completaryData,
                    'units' => Unit::all(),
                    'movement' => $movement])->withErrors($validator);
        }

        $movement->save();
        return redirect()->route('admin.index.completary_datas', ['servant_id' => $contract->servant_id, 'id' =>
            $contract->id])
        ->with('success', 'Movimentação atualizada com sucesso');
    }
}
