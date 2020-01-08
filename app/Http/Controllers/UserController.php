<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Language;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('profile');
    }



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
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}


//funciones para la Web

	public function profile($id)
	{
		$user = User::where('id',$id)->first();

		$languages = Language::where('user_id', $user->id);

		return view('perfil', compact('user', 'languages'));
	}


	public function myAccount()
	{
		return view('mi-cuenta');
	}    


	public function updateAvatar(Request $request){
		// ruta de las imagenes guardadas
		$ruta = public_path().'/images/users/';
		// recogida del form
		$imagenOriginal = $request->file('avatar');
		// crear instancia de imagen
		$imagen = Image::make($imagenOriginal);
		// generar un nombre aleatorio para la imagen
		$temp_name = Str::random(20) . '.' . $imagenOriginal->getClientOriginalExtension();

/*		$imagen->resize(300,300, function($img){
			$img->aspectRatio();
		});*/

		if($imagen->height() >= $imagen->width()){
			$imagen->widen(300);
			$imagen->resizeCanvas(300,300);
		}else
		{
			$imagen->heighten(300);
			$imagen->resizeCanvas(300,300);
		}

		// guardar imagen
		// save( [ruta], [calidad])
		$ruta_final = $ruta . $temp_name;
		$imagen->save($ruta_final, 100);

		$user = User::where('id',$request->id)->first();
		if ($user->avatar != 'default.png')
		{
		  if(\File::exists('images/users/'.$user->avatar)){
		    \File::delete('images/users/'.$user->avatar);
		  }
		}
		$user->avatar = $temp_name;
		$user->save();

		return view('filtros.cambiar-foto');
	}
}
