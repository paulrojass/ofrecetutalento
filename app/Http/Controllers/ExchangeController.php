<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Traits\DatesTranslator;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use App\Exchange;
/*use App\File;*/
use App\Comment;

use Jenssegers\Date\Date;

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
        return $exchange;
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
        /*
        $imagenes = $this->archivosCanje($canje, 'image');
        $videos = $this->archivosCanje($canje, 'video');
        $pdfs = $this->archivosCanje($canje, 'pdf');*/
        $comentarios = Comment::where('exchange_id', $id)->paginate(2);
        //return view('canje', compact('canje','imagenes', 'videos', 'pdfs', 'comentarios'));
        return view('canje', compact('canje', 'comentarios'));
    }

    /*

    public function archivosCanje(Exchange $exchange, $type)
    {
        return File::where('exchange_id', $exchange->id)->where('type',$type)->get();
    }*/

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
        foreach ($exchange->files as $file) {
            $name = $file->location;
            if(!(Str::contains($name, 'default')))
            {
                unlink(public_path() .  '/files/'.$file->type.'/' . $file->location );
            }
        }
        if(!(Str::contains($exchange->image, 'default')))
        {
            unlink(public_path() .  '/images/exchanges/' . $exchange->image );
        }
        $exchange->delete();
    }

    public function guardarCanje(Request $request)
    {
        $exchange = $this->create($request);

        return $exchange->id;
/*        $exchanges = Auth()->User()->exchanges;
        return view('content.mi-cuenta-canjes', compact('exchanges'));*/
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

        return view('forms.mi-cuenta-canje', compact('canje'));
    }

    public function vistaCanje(Exchange $canje){
/*        $imagenes = $canje->files()->where('type', 'image')->get();

        $videos = $canje->files()->where('type', 'video')->get();

        $pdfs = $canje->files()->where('type', 'pdf')->get();*/

        return view('forms.mi-cuenta-canje', compact('canje'));
    }

    public function updateExchangesProfileView($user_id)
    {
      $user = User::find($user_id);

      $exchanges = $user->exchanges();

      return view('content.canjes-perfil', compact('canjes'));
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

            $imagen->widen(800);
            $imagen->resizeCanvas(800,400);

/*            if($imagen->height() >= $imagen->width()){
                $imagen->widen(800);
                $imagen->resizeCanvas(800,400);
            }
            else
            {
                $imagen->widen(800);
                $imagen->resizeCanvas(800,400);
            }*/

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
