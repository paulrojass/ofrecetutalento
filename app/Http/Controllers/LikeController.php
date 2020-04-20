<?php

namespace App\Http\Controllers;

use App\Like;
use App\Exchange;
use App\Talent;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
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
    public function create($canje_id)
    {

        $like = new Like;
        $like->exchange_id = $canje_id;
        $like->user_id = auth()->user()->id;
        $like->save();
    }

    public function createTalent($talento_id)
    {
        
        $like = new Like;
        $like->talent_id = $talento_id;
        $like->user_id = auth()->user()->id;
        $like->save();
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
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    public function changeLike(Request $request)
    {
        $tipo = $request->tipo;

        if($tipo == 'canje'){
            $canje = Exchange::find($request->canje_id);
            if(($request->cambiar) == 1){
                    $like = Like::where('exchange_id', $request->canje_id)->where('user_id', Auth()->user()->id)->first();
                if($like) $this->destroy($like);
                else $this->create($request->canje_id);
            }
            return view('content.likes', compact('canje', 'tipo'));
        }else{
            $talent = Talent::find($request->talent_id);
            if(($request->cambiar) == 1){
                $like = Like::where('talent_id', $request->talent_id)->where('user_id', Auth()->user()->id)->first();
                if($like) $this->destroy($like);
                else $this->createTalent($request->talent_id);
            }
            return view('content.likes', compact('talent', 'tipo'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        $like->delete();
    }
}
