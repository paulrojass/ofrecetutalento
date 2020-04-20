<?php

namespace App\Http\Controllers;

use App\Dealing;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DealingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        if($request->exchange_id != ''){ //si solicita un canje
            if($request->pay == 1){ // y paga el precio
            $validator = \Validator::make($request->all(), [    
            'description' => 'required',
            'exchange_days' => 'required|numeric',
            'exchange_id' => 'required'
            ]);
            }else if($request->proposal_id){
            $validator = \Validator::make($request->all(), [                
            'description' => 'required',
            'exchange_days' => 'required|numeric',
            'proposal_days' => 'required|numeric',
            'proposal_id' => 'required',
            'exchange_id' => 'required'
            ]); 
            }else{
            $validator = \Validator::make($request->all(), [       
            'description' => 'required',
            'proposal_days' => 'required|numeric',
            'exchange_days' => 'required|numeric',
            'name_proposal' => 'required',
            'description_proposal' => 'required',
            'exchange_id' => 'required'
            ]); 
            }
        }else{ // no solicita un canje
            if($request->pay == 1){ // y paga el precio
            $validator = \Validator::make($request->all(), [
            'description' => 'required',
            'exchange_days' => 'required|numeric',
            'ideal' => 'required',
            'plus' => 'required',
            'quantity' => 'required|numeric',
            'value' => 'required|numeric',
            ]);
            }else if($request->proposal_id){
            $validator = \Validator::make($request->all(), [
            'description' => 'required',
            'exchange_days' => 'required|numeric',
            'name' => 'required',
            'ideal' => 'required',
            'plus' => 'required',
            'quantity' => 'required|numeric',
            'proposal_days' => 'required|numeric',
            'proposal_id' => 'required'
            ]);                
            }else{
            $validator = \Validator::make($request->all(), [
            'description' => 'required',
            'exchange_days' => 'required|numeric',
            'name' => 'required',
            'ideal' => 'required',
            'plus' => 'required',
            'quantity' => 'required|numeric',
            'proposal_days' => 'required|numeric',
            'name_proposal' => 'required',
            'description_proposal' => 'required'
            ]); 
            }
        }

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $trato = new Dealing();
        $trato->description = $request->description;
        $trato->pay = $request->pay;
        $trato->proposal_id = $request->proposal_id;
        $trato->propose_id = auth()->user()->id;
        $trato->accept_id = $request->accept_id;
        $trato->exchange_id = $request->exchange_id;
        $trato->exchange_days = $request->exchange_days;
        $trato->proposal_days = $request->proposal_days;

        $trato->name = $request->name;
        $trato->ideal = $request->ideal;
        $trato->plus = $request->plus;
        $trato->quantity = $request->quantity;
        $trato->value = $request->value;

        $trato->name_proposal = $request->name_proposal;
        $trato->description_proposal = $request->description_proposal;

        $trato->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dealing  $dealing
     * @return \Illuminate\Http\Response
     */
    public function show(Dealing $dealing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dealing  $dealing
     * @return \Illuminate\Http\Response
     */
    public function edit(Dealing $dealing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dealing  $dealing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dealing $dealing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dealing  $dealing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dealing $dealing)
    {
        //
    }

    public function newDealing(Request $request)
    {
        return $this->create($request);
    }


    public function aprobar(Request $request)
    {
        $trato = Dealing::find($request->dealing_id);
        $trato->approved = $request->aprobar;
        $trato->save();
        return $trato;
    }

    public function recibido(Request $request)
    {
    	$trato = Dealing::find($request->dealing_id);
    	if($request->type == 'propuesto'){
    		$trato->dealing_ready = 1;
    	}else{
    		$trato->proposal_ready = 1;
    	}

        $trato->save();

        if($trato->proposal_id != null) return $trato->proposal_id;
        else return null;
    }

    public function contadorTratos()
    {
        return view('content.contador-tratos');
    }

    public function visto(Request $request)
    {
        $trato = Dealing::find($request->dealing_id);
        $trato->received = 1;
        $trato->save();
        return $trato;
    }
}
