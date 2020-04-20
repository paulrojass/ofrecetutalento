<?php

namespace App\Http\Controllers;

use App\Talent;
use App\User;
use App\Suscription;
use App\plan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Traits\DatesTranslator;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use App\File;
use DB;

use Illuminate\Support\Facades\Validator;

class TalentController extends Controller
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
        $this->validator($request)->validate();

        $talento = new Talent();
        $talento->title = $request->title;
        $talento->category_id = $request->category;
        $talento->level = $request->level;
        $talento->description = $request->description;
        $talento->user_id = $request->id_user;
        $talento->save();
        return response()->json([
            'success'=> 'Talento Registrado'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Talent::find($id);
    }

    public function talento($id){
        $talent = $this->show($id);
        $imagenes = $this->archivosTalento($talent, 'image');
        $videos = $this->archivosTalento($talent, 'video');
        $pdfs = $this->archivosTalento($talent, 'pdf');
        //$comentarios = Comment::where('exchange_id', $id)->get();
        return view('talento', compact('talent','imagenes', 'videos', 'pdfs'));
    }

    public function archivosTalento(Talent $talent, $type)
    {
        return File::where('talent_id', $talent->id)->where('type',$type)->get();
    }

    public function showTalentsUser(Request $request)
    {
        $talentos = Talent::where('user_id', $request->user_id);

        $agregados = $talentos->count();

        $suscripcion = Suscription::find($request->user_id);

        $plan_id = $suscripcion->plan_id;

        $plan = Plan::find($plan_id);

        $maximo = $plan->talents;

        if($maximo == null){
            $disponibles = null;
        }else{
            $disponibles = $maximo - $agregados;
        }

        
        return response()->json([
            'success'=> 'Nuevo talento',
            'talentos' => $talentos,
            'agregados' => $agregados,
            'disponibles' => $disponibles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function edit(Talent $talent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Talent $talento)
    {
        $talento->title = $request->title;
        $talento->category_id = $request->category;
        $talento->level = $request->level;
        $talento->description = $request->description;
        $talento->user_id = $request->id_user;
        $talento->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talent $talent)
    {
        $talent->delete();
    }

    public function actualizarTalento(Request $request)
    {
        $talent = Talent::where('id', $request->id)->first();

        $this->update($request, $talent);
    }

    public function eliminarTalento(Request $request)
    {
        $talent = Talent::where('id', $request->id)->first();
        $this->destroy($talent);
    }

    protected function validator(Request $request)
    {
        
        return Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'description' => 'required',
            'level' => 'required',
            'category' => 'required'
        ]);

        if ($validator->passes()) {
            return response()->json(['success'=>'Added new records.']);

        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }


}
