<?php

namespace App\Http\Controllers;

use App\Suscription;
use Illuminate\Http\Request;

use Carbon\Carbon;

class SuscriptionController extends Controller
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
    public function create()
    {
        //
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
     * @param  \App\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function show(Suscription $suscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscription $suscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscription $suscription)
    {
        if($request->type){
            if($request->type == 'Mensual') $suscription->expiration_date = Carbon::now()->addMonth(1);
            if($request->type == 'Trimestral') $suscription->expiration_date = Carbon::now()->addMonth(3);
            if($request->type == 'Anual') $suscription->expiration_date = Carbon::now()->addYear(1);
        }
        else $suscription->expiration_date = null;
        
        $suscription->user_id = $request->user_id;
        $suscription->plan_id = $request->plan_id;
        $suscription->save();

        return view('plan-cambiado',compact('suscription'));
    }

    public function change(Request $request)
    {
        $suscription = Suscription::find($request->user_id);
        return $this->update($request, $suscription);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscription $suscription)
    {
        //
    }
}
