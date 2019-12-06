<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\User;
use App\Category;

class SearchController extends Controller
{
	public function talentsFilter(Request $request){

		$busqueda = $request->input('search');
		$ubicacion = $request->input('location');
		$categoria = $request->category;

		if(empty($busqueda) && empty($ubicacion) && $categoria == null){
			$users = User::paginate(10);
		}
		else{
			$query = User::query();

			if (!empty($busqueda)) {
				$query->talent($busqueda);
			}

			if (!empty($ubicacion)) {
				$query->location($ubicacion);
			}

			if ($categoria != NULL) {
				$query->categories($categoria);
			}

			$users = $query->paginate(10);
		}

		$categories = Category::all();
		return view('filtros.talentos', compact('users', 'categories'));
	}
}
