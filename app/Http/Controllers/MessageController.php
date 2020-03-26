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
    public function create(Request $request)
    {

        $message = new Message();
        $message->to_id = $request->to_id;
        $message->from_id = $request->from_id;
        $message->body = $request->body;
        $message->save();
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


    public function mensajesId($from_id)
    {
        //if ($from_id != auth()->user()->id) return back();

        $recibidos = Message::where('to_id', auth()->user()->id )->get();

        $enviados = Message::where('from_id', auth()->user()->id )->get();

        $mensajes = $recibidos->merge($enviados);

        $usuarios = $mensajes->unique('from_id')->sortBy('created_at');

        return view('mensajes', compact('mensajes', 'usuarios', 'from_id'));
    }

    public function mensajes()
    {
        //Si no es usuario Pro o Gold no entra
        if(auth()->user()->suscription->plan_id <= 2) return back();

        $recibidos = Message::where('to_id', auth()->user()->id )->get();

        $enviados = Message::where('from_id', auth()->user()->id )->get();

        $mensajes = $recibidos->merge($enviados);

        $usuarios = $mensajes->unique('from_id')->sortBy('created_at');

        if($usuarios->count()>1){
            $from_id = $usuarios[0]->from_id;
        }else
        {
            $from_id = 0;
        }


        return view('mensajes', compact('mensajes', 'usuarios', 'from_id'));
    }

    public function mensajesUsuario(Request $request)
    {
        $recibidos = Message::where('to_id', $request->to_id )->where('from_id', $request->from_id )->get();

        foreach ($recibidos as $recibido) { $this->marcar($recibido); }
        
        $enviados = Message::where('to_id', $request->from_id )->where('from_id', $request->to_id )->get();
        
        $mensajes = $recibidos->merge($enviados);

        $mensajes = $mensajes->sortBy('created_at');
        
        return view('filtros.mensajes', compact('mensajes'));
    }

    public function marcar(Message $message){
        if(!$message->received){
            $message->received = 1;
            $message->save();
        }
    }

    public function nuevoMensaje(Request $request)
    {
        $this->create($request);
        
        $recibidos = Message::where('to_id', $request->to_id )->where('from_id', $request->from_id )->get();
        
        $enviados = Message::where('to_id', $request->from_id )->where('from_id', $request->to_id )->get();
        
        $mensajes = $recibidos->merge($enviados);

        $mensajes = $mensajes->sortBy('created_at');
        
        return view('filtros.mensajes', compact('mensajes'));
    }

    public function nuevoMensajePerfil(Request $request)
    {
        return $this->create($request);
    }

    public function contadorMensajes()
    {
        return view('content.contador-mensajes');
    }
}
