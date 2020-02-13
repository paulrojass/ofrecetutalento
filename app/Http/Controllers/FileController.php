<?php

namespace App\Http\Controllers;

use App\File;
use App\Plan;
use App\Exchange;
use App\Suscription;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

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
        $file->delete();
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

    public function agregarImagen(Request $request)
    {
		// ruta de las imagenes guardadas
		$ruta = public_path().'/files/image/';
		// recogida del form
		$imagenOriginal = $request->file('location');
		// crear instancia de imagen
		$imagen = Image::make($imagenOriginal);
		// generar un nombre aleatorio para la imagen
		$temp_name = Str::random(20) . '.' . $imagenOriginal->getClientOriginalExtension();

		// guardar imagen
		// save( [ruta], [calidad])
		$ruta_final = $ruta . $temp_name;
		$imagen->save($ruta_final, 100);

		$file = new File();
		$file->location = $temp_name;
		$file->type = 'image';
		$file->exchange_id = $request->exchange_id;
		$file->save();

		$archivos = File::where('exchange_id', $request->exchange_id)->where('type', 'image')->get();

		return view('content.canje-image', compact('archivos'));    	
    }

    public function agregarPdf(request $request)
    {
		// ruta de los pdf guardados
		$ruta = public_path().'/files/pdf/';

		// generar un nombre aleatorio para el pdf
		$temp_name = Str::random(20) . '.pdf';



			
    }

    public function eliminarImagen(Request $request)
    {
    	$imagen = File::where('id', $request->id)->first();
    	\File::delete('files/image/'.$imagen->location);
        $this->destroy($imagen);

		$archivos = File::where('exchange_id', $imagen->exchange_id)->where('type', 'image')->get();

		return view('content.canje-image', compact('archivos'));
    }
}
