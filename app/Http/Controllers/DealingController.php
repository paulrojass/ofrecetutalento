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
        $trato = new Dealing();
        $trato->description = $request->description;
        $trato->pay = $request->pay;
        $trato->exchange_proposal = $request->exchange_proposal;
        $trato->propose_id = auth()->user()->id;
        $trato->accept_id = $request->accept_id;
        $trato->exchange_id = $request->exchange_id;
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
        $this->create($request);
    }


}
