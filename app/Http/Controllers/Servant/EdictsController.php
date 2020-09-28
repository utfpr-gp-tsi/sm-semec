<?php

namespace App\Http\Controllers\Servant;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Servant\AppController;
use Illuminate\Http\Request;
use App\Edict;
use App\Servant;
use App\Contract;
use App\Subscription;

class EdictsController extends AppController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function new()
    {
        $edict = new Edict();
        $servant = Servant::find(\Auth::guard('servant')->user()->id);
        $subscription = new subscription();
        $contract = Contract::find($servant);
        foreach ($contract as $contract) {
            $contracts=$contract->place;
            }
        return view('servant.edicts.inscription.new', compact('edict', 'servant','subscription','contracts'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
       */
    public function create(Request $request)
    {
        $data = $request->all();
        $subscription = new Subscription($data);

        $servant = Servant::find(\Auth::guard('servant')->user()->id);
        $contract = Contract::find($servant);
        foreach ($contract as $contract) {
            $contracts=$contract->place;
            }

        $validator = Validator::make($data, [
            'name'     => 'required', 
            'removal_type'     => 'required',
            'place'     => 'required',
            'interest_unit'     => 'required',
            'reason'     => 'required',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem campos em branco! Por favor verifique!');
            return view('servant.edicts.new', compact('subscription','servant', 'contracts'))->withErrors($validator);
        }

        $subscription->contract_id=$contract->id;
        $servant->subscriptions()->save($subscription);
        return redirect()->route('servant.dashboard')->with('success', 'Inscrição realizada com sucesso!');
    }
}
