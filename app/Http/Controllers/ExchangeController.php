<?php

namespace App\Http\Controllers;

use App\Exchange;
use App\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Traits\DatesTranslator;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

use DB;

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
        $imagenes = $this->archivosCanje($canje, 'image');
        $videos = $this->archivosCanje($canje, 'video');
        $pdfs = $this->archivosCanje($canje, 'pdf');
        return view('canje', compact('canje','imagenes', 'videos', 'pdfs'));
    }

    public function archivosCanje(Exchange $exchange, $type)
    {
        return File::where('exchange_id', $exchange->id)->where('type',$type)->get();
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
        $canje = Exchange::where('id', $request->id)->first();

        $this->update($request, $canje);

        $exchanges = Auth()->User()->exchanges;
        return view('content.mi-cuenta-canjes', compact('exchanges'));
    }

    public function formCanje(Request $request){

        $canje = Exchange::find($request->id);

        return $this->vistaCanje($canje);

    }

    public function vistaCanje(Exchange $canje){
        $imagenes = $canje->files()->where('type', 'image')->get();

        $videos = $canje->files()->where('type', 'video')->get();

        $pdfs = $canje->files()->where('type', 'pdf')->get();

        return view('forms.mi-cuenta-canje', compact('canje', 'imagenes', 'videos', 'pdfs'));
    }



    public function updateImageCanje(Request $request){
        // ruta de las imagenes guardadas
        $ruta = public_path().'/images/exchanges/';
        // recogida del form
        $imagenOriginal = $request->file('img-canje-file');
        // crear instancia de imagen
        $imagen = Image::make($imagenOriginal);

        if ($imagen->width() > 800 && $imagen->height() > 400) {
            // generar un nombre aleatorio para la imagen
            $temp_name = Str::random(20) . '.' . $imagenOriginal->getClientOriginalExtension();

            if($imagen->height() >= $imagen->width()){
               $imagen->widen(800);
 /*                $imagen->heighten(400);*/
                $imagen->resizeCanvas(800,400);
            }
            else
            {
               $imagen->heighten(400);
 /*                $imagen->widen(800);*/
                $imagen->resizeCanvas(800,400);
            }

            // guardar imagen
            // save( [ruta], [calidad])
            $ruta_final = $ruta . $temp_name;
            $imagen->save($ruta_final, 100);

            $canje = Exchange::find($request->id);
            if ($canje->image != 'default.jpg')
            {
              if(\File::exists('images/exchanges/'.$canje->image)){
                \File::delete('images/exchanges/'.$canje->image);
              }
            }
            $canje->image = $temp_name;
            $canje->save();

            return $this->vistaCanje($canje);
        }
        else
        {
            return response()->view('errors.custom', [], 500);
        }
    }


}
