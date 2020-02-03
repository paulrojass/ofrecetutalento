<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }


    public function mensajes()
    {
        $recibidos = Message::where('to_id', auth()->user()->id )->get();

        $enviados = Message::where('from_id', auth()->user()->id )->get();

        $mensajes = $recibidos->merge($enviados);

        $usuarios = $mensajes->unique('from_id')->sortByDesc('created_at');

        return view('mensajes', compact('recibidos', 'usuarios'));
    }

    public function mensajesUsuario(Request $request)
    {
        $recibidos = Message::where('to_id', auth()->user()->id )->where('from_id', $request->from_id )->get();
        $enviados = Message::where('to_id', $request->from_id )->where('from_id', auth()->user()->id )->get();
        $mensajes = $recibidos->merge($enviados);
        $mensajes = $mensajes->sortByDesc('created_at');
        return view('filtros.mensajes', compact('mensajes'));
    }
}
