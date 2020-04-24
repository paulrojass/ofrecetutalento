<?php

namespace App\Http\Controllers;

use App\Recommendation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
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
        $recommendation = new Recommendation;
        $recommendation->recommended_id = $request->user_id;
        $recommendation->user_id = auth()->user()->id;
        $recommendation->save();
        return $recommendation;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function show(Recommendation $recommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function edit(Recommendation $recommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recommendation $recommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recommendation $recommendation)
    {
        $recommendation->delete();
    }

    public function updateView(Request $request)
    {
        $recommendation = Recommendation::where('user_id', Auth()->user()->id)->where('recommended_id', $request->user_id)->first();
        if($request->cambiar == 1){
            if($recommendation){
                $this->destroy($recommendation);
                return view('content.recommended');
            }
            else $recommendation = $this->store($request);
        }
        return view('content.recommended', compact('recommendation'));
    }
}
