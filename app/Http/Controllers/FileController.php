<?php

namespace App\Http\Controllers;

use App\File;
use App\Plan;
use App\Exchange;
use App\Suscription;
use Illuminate\Http\Request;

class FileController extends Controller
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
	 * @param  \App\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function show(File $file)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function edit(File $file)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, File $file)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(File $file)
	{
		//
	}

	public function showFilesUser(Request $request)
	{
		$suscripcion = Suscription::find($request->user_id);
		$plan = Plan::find($suscripcion->plan_id);

		if($request->type == 'image') $maximo = $plan->images;
		if($request->type == 'video') $maximo = $plan->videos;
		if($request->type == 'pdf') $maximo = $plan->pdfs;

		if($maximo == null){
			$files = File::where('exchange_id', $request->exchange_id)->where('type', $request->type)->get();
			$agregados = $files->count();
			$disponibles = null;
		}else{
			$disponibles = $maximo - $agregados;
		}

		return response()->json([
			'success'=> 'Nueva imagen',
			'talentos' => $files,
			'agregados' => $agregados,
			'disponibles' => $disponibles
		]);
	}

    public function actualizarArchivos(Request $request)
    {
		$archivos = File::where('exchange_id', $request->canje_id)->where('type', $request->type)->get();
        
        if($request->type == 'image') return view('content.canje-image', compact('archivos'));

        if($request->type == 'video') return view('content.canje-video', compact('archivos'));

        if($request->type == 'pdf') return view('content.canje-pdf', compact('archivos'));
    }	
}
