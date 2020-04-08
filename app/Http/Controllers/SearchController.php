<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Exchange;
use App\Category;
use App\User;

use DB;

class SearchController extends Controller
{
	public function principalSearch(Request $request)
	{
		$busqueda = $request->input('search');
		$industry = $request->industry;
		if(empty($busqueda) && $industry == ""){
			$users = User::paginate(10);
		}
		else{
			$query = User::query();

			if (!empty($busqueda)) {
				$query->talent($busqueda);
			}

			if ($industry) {
				$categoria = Category::select('id')->where('industry_id', $industry)->get()->toArray();

			/*if ($categoria != NULL) {*/
				$query->categories($categoria);
			}

			$users = $query->paginate(10);
		}

		$categories = Category::all();
		return view('talentos', compact('users', 'categories', 'busqueda'));
	}

    public function fetch_data_talents(Request $request)
    {
		if($request->ajax())
		{
			$busqueda = $request->input('search');
			$ubicacion = $request->input('location');
			//$categoria = $request->category;
			$categoria = isset($request->category) ? json_decode($request->category) : array();

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

				if ($categoria) {
				/*if ($categoria != NULL) {*/
					$query->categories($categoria);
				}

				$users = $query->paginate(10);
			}

			$categories = Category::all();
			//return view('filtros.talentos', compact('users', 'categories'));

		  	return view('filtros.talentos', compact('users', 'categories'))->render();
		}
    }

    public function fetch_data_exchanges(Request $request)
    {
		if($request->ajax())
		{
			$busqueda = $request->input('search');
			//$ubicacion = $request->input('location');
			$fecha = $request->input('date');
			//$categoria = $request->category;
			$minimo = $request->input('min');
			$maximo = $request->input('max');

			$categoria = isset($request->category) ? json_decode($request->category) : array();

			/*
			if(empty($busqueda) && empty($ubicacion) && $categoria == null && $fecha == 'todos' && empty($minimo) && empty($maximo)){*/
			if(empty($busqueda) && $fecha == 'todos' && empty($minimo) && empty($maximo) && $categoria == null){
				$exchanges = Exchange::paginate(10);
			}
			else{
				$query = Exchange::query();

				if (!empty($busqueda)) {
					$query->search($busqueda);
				}

				if (!empty($fecha)) {
					$query->date($fecha);
				}

				if (!empty($minimo)) {
					$query->min($minimo);
				}

				if (!empty($maximo)) {
					$query->max($maximo);
				}

				if ($categoria) {
				/*if ($categoria != NULL) {*/
					$query->categories($categoria);
				}

				/*
				if ($categoria != NULL) {
					$query->categories($categoria);
				}*/

				$exchanges = $query->paginate(10);
			}

			$categories = Category::all();
			return view('filtros.canjes', compact('exchanges', 'categories'))->render();
		}
	}
}
