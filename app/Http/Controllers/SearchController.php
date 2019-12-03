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

		if($request->search) $busqueda = $request->search;
		if($request->location) $ubicacion = $request->location;

	/*		if($request->search && $request->location && $request->category){
				$users = User::whereHas('talents', function (Builder $query) use($busqueda){
					$query->talent($busqueda);
				})->location($ubicacion)->paginate(10);
			}	elseif($request->search){
					$users = User::whereHas('talents', function (Builder $query) use($busqueda){
						$query->talent($busqueda);
					})->paginate(10);

				}	elseif($request->location){
						$users = User::location($ubicacion)->paginate(10);
					}	else return back()->withInput();
	*/



		if( $request->search || $request->location || $request->category ){

		}else return back()->withInput();

		$industries = Industry::all();
		$categories = Category::all();
		return view('talentos', compact('users', 'industries', 'categories'));


	}
}
