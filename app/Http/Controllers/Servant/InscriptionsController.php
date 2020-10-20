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
    public function new($id)
    {

        $edict = Edict::find($id);
        $servant = Servant::find(\Auth::guard('servant')->user()->id);
        $subscription = new subscription();

        $contracts = $servant->contracts;

        $units = Unit::orderBy('name', 'ASC')->get();

        return view('servant.edicts.inscription.new', compact('edict', 'servant','subscription','contracts','units'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\View\View | \Illuminate\Http\RedirectResponse.
       */
    public function create(Request $request , $id)
    {
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

        $subscription->fill($data);
        $edict = Edict::find($id);
        $servant = Servant::find(\Auth::guard('servant')->user()->id);
        $contracts = Contract::find($servant);

        $units = Unit::find($id);
       
        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem campos em branco! Por favor verifique!');
            return view('servant.edicts.inscription.new', compact('subscription','servant', 'contracts', 'units' , 'edict' ,))->withErrors($validator);
        }
        elseif (now()->toShortDateTime() > $edict->started_at->toShortDateTime()) {
            $request->session()->flash('danger', 'A data limite das inscriçoes foi atingida!');
            return view('servant.edicts.inscription.new', compact('subscription','servant', 'contracts', 'units' , 'edict' ,))->withErrors($validator);
        }

       

        $subscription->servant_id = $servant->id;
        $subscription->unit_id = $units->id;
        $edict->subscriptions()->save($subscription);
        return redirect()->route('servant.dashboard')->with('success', 'Inscrição realizada com sucesso!');
    }
}
