<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Language;
use App\Experience;
use App\Industry;
use App\Category;
use App\Talent;
use App\Exchange;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

use DB;

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
		$user = User::where('id', $id)->first();
		$user->name = $request->name;
		$user->lastname = $request->lastname;
		$user->nationality = $request->nationality;
		$user->address = $request->address;
		$user->city = $request->city;
		$user->country = $request->country;
		$user->document = $request->document;
		$user->phone = $request->phone;
		$user->abilities = $request->abilities;
		$user->email = $request->email;
		$user->save();
	}

	public function updateExperience(Request $request, $id)
	{
		$experience = Experience::where('user_id', $id)->first();
		$experience->company1 = $request->company1;
		$experience->position1 = $request->position1;
		$experience->start_date1 = $request->start_date1;
		$experience->due_date1 = $request->due_date1;
		$experience->achievements1 = $request->achievements1;
		$experience->company2 = $request->company2;
		$experience->position2 = $request->position2;
		$experience->start_date2 = $request->start_date2;
		$experience->due_date2 = $request->due_date2;
		$experience->achievements2 = $request->achievements2;
		$experience->company3 = $request->company3;
		$experience->position3 = $request->position3;
		$experience->start_date3 = $request->start_date3;
		$experience->due_date3 = $request->due_date3;
		$experience->achievements3 = $request->achievements3;
		$experience->save();
	}



	public function updateUser(Request $request)
	{
		$this->update($request, Auth::user()->id);
		$this->updateExperience($request, Auth::user()->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
        if(!(Str::contains($user->avatar, 'default')))
        {
        	unlink(public_path() . '/images/users/' . $user->avatar );
        }
        $user->delete();
	}


//funciones para la Web

	public function profile($id)
	{
		$user = User::where('id',$id)->first();

		$evaluadores = $user->evaluated()->count();

		$valoracion = $this->valoracion($user);

		$languages = Language::where('user_id', $user->id);

		return view('perfil', compact('user', 'languages', 'valoracion', 'evaluadores'));
	}


	public function valoracion($user){
		$contar = 0;
		$evaluadores = $user->evaluated()->count();
		if($evaluadores == 0 ) return 0;

		else{
			foreach ($user->evaluated as $evaluacion) {
				$contar += $evaluacion->value;
			}
			$valoracion = $contar/$evaluadores;
		}
		return $valoracion;

	}


	public function myAccount()
	{
		request()->session()->regenerateToken();

        $talents = Auth()->User()->talents;

        $exchanges = Auth()->User()->exchanges;

		$categories = Category::all();
		return view('mi-cuenta', compact('categories', 'talents', 'exchanges'));
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
		$foto = $temp_name;
		return view('filtros.cambiar-foto', compact('foto'));
	}
}
