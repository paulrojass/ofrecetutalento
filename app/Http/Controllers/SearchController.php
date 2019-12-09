<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Exchange;
use App\Category;
use App\User;

class SearchController extends Controller
{
	public function talentsFilter(Request $request){

		$busqueda = $request->input('search');
		$ubicacion = $request->input('location');
		$categoria = $request->category;

		if(empty($busqueda) && empty($ubicacion) && $categoria == null){
			$exchanges = User::paginate(10);
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


	public function exchangesFilter(Request $request){

		$busqueda = $request->input('search');
		$ubicacion = $request->input('location');
		$fecha = $request->input('date');
		$categoria = $request->category;
		$minimo = $request->input('min');
		$maximo = $request->input('max');



/*		if(empty($busqueda) && empty($ubicacion) && $categoria == null && $fecha == 'todos' && empty($minimo) && empty($maximo)){*/
		if(empty($busqueda) && $fecha == 'todos' && empty($minimo) && empty($maximo)){
			$exchanges = Exchange::paginate(10);
		}
		else{
			$query = Exchange::query();

			if (!empty($busqueda)) {
				$query->search($busqueda);
			}

/*			if (!empty($ubicacion)) {
				$query->location($ubicacion);
			}*/

			if (!empty($fecha)) {
				$query->date($fecha);
			}

			if (!empty($minimo)) {
				$query->min($minimo);
			}

			if (!empty($maximo)) {
				$query->max($maximo);
			}

/*			if ($categoria != NULL) {
				$query->categories($categoria);
			}*/

			$exchanges = $query->paginate(10);
		}

		$categories = Category::all();
		return view('filtros.canjes', compact('exchanges', 'categories'));
	}

	


}
