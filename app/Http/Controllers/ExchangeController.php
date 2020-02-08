<?php

namespace App\Http\Controllers;

use App\Exchange;
use App\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Traits\DatesTranslator;


class ExchangeController extends Controller
{
    use DatesTranslator;

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
        $exchange = new Exchange();
        $exchange->title = $request->title;
        $exchange->price = $request->price;
        $exchange->description = $request->description;
        $exchange->talent_id = $request->talent_id;
        $exchange->save();
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
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Exchange::find($id);
    }

    public function canje($id)
    {
        $canje = $this->show($id);
        $archivos = $this->archivosCanje($canje);
        return view('canje', compact('canje','archivos'));
    }

    public function archivosCanje(Exchange $exchange)
    {
        return File::where('exchange_id', $exchange->id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        $exchange->title = $request->title;
        $exchange->price = $request->price;
        $exchange->talent_id = $request->talent_id;
        $exchange->description = $request->description;
        $exchange->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        $exchange->delete();
    }

    public function guardarCanje(Request $request)
    {
        $this->create($request);
        $exchanges = Auth()->User()->exchanges;
        return view('content.mi-cuenta-canjes', compact('exchanges'));
    }

    public function eliminarCanje(Request $request)
    {
        $exchange = Exchange::where('id', $request->id)->first();
        $this->destroy($exchange);
    }

    public function actualizarCanje(Request $request)
    {
        $exchange = Exchange::where('id', $request->id)->first();

        $this->update($request, $exchange);
    }

}
