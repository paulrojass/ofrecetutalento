<?php

namespace App\Http\Controllers;

use App\Talent;
use App\User;
use App\Suscription;
use App\plan;
use Illuminate\Http\Request;

class TalentController extends Controller
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
        $talento = new Talent();
        $talento->title = $request->title;
        $talento->category_id = $request->category;
        $talento->level = $request->level;
        $talento->description = $request->description;
        $talento->user_id = $request->id_user;
        $talento->save();
        return response()->json([
            'success'=> 'Talento Registrado'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function show(Talent $talent)
    {
        //
    }

    public function showTalentsUser(Request $request)
    {
        $talentos = Talent::where('user_id', $request->user_id);

        $agregados = $talentos->count();

        $suscripcion = Suscription::find($request->user_id);

        $plan_id = $suscripcion->plan_id;

        $plan = Plan::find($plan_id);

        $maximo = $plan->talents;

        $disponibles = $maximo - $agregados;
        
        return response()->json([
            'success'=> 'Nuevo talento',
            'talentos' => $talentos,
            'agregados' => $agregados,
            'disponibles' => $disponibles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function edit(Talent $talent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Talent $talent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talent $talent)
    {
        //
    }
}
