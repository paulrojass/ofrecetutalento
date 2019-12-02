<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Talent;
use App\User;
use App\Industry;
use App\Category;

class SearchController extends Controller
{
	public function talentsFilter(Request $request){

		if($request->search && $request->location){
			$busqueda = $request->search;
			$ubicacion = $request->location;

			$users = User::whereHas('talents', function (Builder $query) use($busqueda){
				$query->where('title', 'LIKE' , '%' . $busqueda . '%')->orWhere('description', 'LIKE' , '%' . $busqueda . '%');
			})->location($ubicacion)->paginate(10);
		}	elseif($request->search){
				$busqueda = $request->search;

				$users = User::whereHas('talents', function (Builder $query) use($busqueda){
					$query->where('title', 'LIKE' , '%' . $busqueda . '%')->orWhere('description', 'LIKE' , '%' . $busqueda . '%');
				})->paginate(10);

			}	elseif($request->location){
					$ubicacion = $request->location;
					$users = User::location($ubicacion)->paginate(10);
				}	else return back()->withInput();

/*		foreach ($user->talents-> as $key => $value) {
			# code...
		}*/

		
		$industries = Industry::all();
		$categories = Category::all();
		return view('talentos', compact('users', 'industries', 'categories'));


	}
}
