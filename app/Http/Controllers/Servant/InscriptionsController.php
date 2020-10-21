<?php

namespace App\Http\Controllers\Servant;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Servant\AppController;
use Illuminate\Http\Request;
use App\Models\Edict;
use App\Models\Servant;
use App\Models\Contract;
use App\Models\Subscription;
use App\Models\Unit;

class InscriptionsController extends AppController
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function new(Request $request, $edict_id)
    {
        $edict = Edict::find($edict_id);
        if (now()->toShortDateTime() > $edict->ended_at->toShortDateTime()) {
            \Session::flash('danger', 'A data limite das inscriçoes foi atingida!');
            return redirect()->route('servant.dashboard');
        }

        $servant = \Auth::guard('servant')->user();
        $contracts = $servant->contracts;
        $units = Unit::orderBy('name', 'ASC')->get();

        $subscription = new subscription();
        return view('servant.edicts.inscription.new', compact('edict', 'servant','subscription','contracts','units'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
       */
    public function create(Request $request, $edict_id)
    {
        $edict = Edict::find($edict_id);
        if (now()->toShortDateTime() > $edict->ended_at->toShortDateTime()) {
            \Session::flash('danger', 'A data limite das inscriçoes foi atingida!');
            return redirect()->route('servant.dashboard');
        }

        $data = $request->all();

        $validator = Validator::make($data, [
            'name'     => 'required',
            'contract_id'     => 'required',
            'removal_type'     => 'required',
            'place'     => 'required',
            'unit_id'     => 'required',
            'reason'     => 'required',
        ]);

        $subscription = new Subscription($data);
        // dd($data);
        // $subscription->fill($data);
        //
        $edict = Edict::find($edict_id);
        $servant = \Auth::guard('servant')->user();
        // $contracts = Contract::find($servant);
        $contracts = $servant->contracts;
        $units = Unit::orderBy('name', 'ASC')->get();
        // dd($subscription->unit_id);
        // $units = Unit::find($id);
        // dd($subscription);
        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem campos em branco! Por favor verifique!');
            return view('servant.edicts.inscription.new', compact('edict', 'servant', 'subscription', 'contracts', 'units'))->withErrors($validator);
        }

        $subscription->servant_id = $servant->id;
        $edict->subscriptions()->save($subscription);

        return redirect()->route('servant.dashboard')->with('success', 'Inscrição realizada com sucesso!');
    }
}
