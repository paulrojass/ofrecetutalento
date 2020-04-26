<?php

namespace App\Http\Controllers;

use App\Suscription;
use App\User;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ChangePlan;

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
        if($request->id_usuario) $usuario = $request->id_usuario;
        else $usuario = $request->user_id;

        if($request->id_producto) $producto = $request->id_producto;
        else $producto = $request->plan_id;

        
        if($request->periodo) $periodo = $request->periodo;
        elseif($request->type) $periodo = $request->type;
        else $periodo = null;

        if($periodo){
            if($periodo == 'Mensual') $suscription->expiration_date = Carbon::now()->addMonth(1);
            if($periodo == 'Trimestral') $suscription->expiration_date = Carbon::now()->addMonth(3);
            if($periodo == 'Anual') $suscription->expiration_date = Carbon::now()->addYear(1);
        }
        else $suscription->expiration_date = null;
        
        $suscription->user_id = $usuario;
        $suscription->plan_id = $producto;
        $suscription->save();

        $user = User::find($usuario);
        $user->notify(new ChangePlan($suscription));
        return view('plan-cambiado',compact('suscription', 'request'));
    }

    public function change(Request $request)
    {
        if($request->id_usuario) $usuario = $request->id_usuario;
        else $usuario = $request->user_id;

        $suscription = Suscription::find($usuario);
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

    public function callback(Request $request)
    {
        //dd($request->all());

        $hashSecretWord = 'MjM3NzExYTYtMmRmZi00YjlmLTliZGItZWY0NDc3ZGY5ZDYz'; //2Checkout Secret Word
        $hashSid        = $request->sid; //2Checkout account number
        $hashTotal      = $request->total; //Sale total to validate against
        $hashOrder      = $request->order_number; //2Checkout Order Number
        $StringToHash   = strtoupper(md5($hashSecretWord . $hashSid . $hashOrder . $hashTotal));

        if ($StringToHash == $request->key) return $this->change($request);
        return back();
    }

    public function planVencido(){
        return view('plan-vencido');
    }


}
