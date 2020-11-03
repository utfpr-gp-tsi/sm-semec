<?php

namespace App\Http\Controllers\Servant;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Servant\AppController;
use Illuminate\Http\Request;
use App\Models\Edict;
use App\Models\Subscription;
use App\Models\Unit;
use App\Models\Removal;

class InscriptionsController extends AppController
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     * @param \App\Models\Edict $edictId
     * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
     */
    public function new($edictId)
    {
        $edict = Edict::find($edictId);
        if (now()->toShortDateTime() > $edict->ended_at->toShortDateTime()) {
            \Session::flash('danger', 'A data limite das inscrições foi atingida!');
            return redirect()->route('servant.dashboard');
        }

        $servant = \Auth::guard('servant')->user();
        $contracts = $servant->contracts;
        $units = Unit::orderBy('name', 'ASC')->get();

        $removals = Removal::all();

        $subscription = new subscription();
        return view('servant.edicts.inscription.new', (
        compact('edict', 'servant', 'subscription', 'contracts', 'units', 'removals')));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Edict $edictId
     * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
       */
    public function create(Request $request, $edictId)
    {
        $edict = Edict::find($edictId);
        if (now()->toShortDateTime() > $edict->ended_at->toShortDateTime()) {
            \Session::flash('danger', 'A data limite das inscrições foi atingida!');
            return redirect()->route('servant.dashboard');
        }

        $data = $request->all();

        $validator = Validator::make($data, [
            'contract_id'     => 'required',
            'removal_id'     => 'required',
            'place'     => 'required',
            'unit_id'     => 'required',
            'reason'     => 'required',
        ]);

        $subscription = new Subscription($data);
       
        $edict = Edict::find($edictId);
        $servant = \Auth::guard('servant')->user();

        $removals = Removal::all();

        $contracts = $servant->contracts;
        $units = Unit::orderBy('name', 'ASC')->get();
       
        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem campos em branco! Por favor verifique!');
            return view('servant.edicts.inscription.new', (
            compact('edict', 'servant', 'subscription', 'contracts', 'units', 'removals')))->withErrors($validator);
        }

        $subscription->servant_id = $servant->id;
        $edict->subscriptions()->save($subscription);

        return redirect()->route('servant.dashboard')->with('success', 'Inscrição realizada com sucesso!');
    }
}
