<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Talent;
use App\User;
use App\Industry;
use App\Category;

class SearchController extends Controller
{
	public function talentsFilter(Request $request){

		if($request->search && $request->location)
		{
			$busqueda = $request->search;
			$ubicacion = $request->location;

			$users = User::where('talentos.title','LIKE',$busqueda)
				->orWhere('talentos.description','LIKE',$busqueda)
				->location($ubicacion)->paginate(10);
		}
		else
		{
			if($request->search){
				$busqueda = $request->search;
/*				$users = User::where('talentos.title','LIKE',$busqueda)
				->orWhere('talentos.description','LIKE',$busqueda)->paginate(10);*/
/*				$users = User::whereHas('talents', function ($query) use ($busqueda){
                	$query->where('title','LIKE',"%$busqueda%")->where('description','LIKE',"%$busqueda%")->paginate(10);
                });*/
                $users = User::with(['talents' => function ($query) use ($busqueda) {
				    $query->where('title', 'LIKE', '%$busqueda%');
				}])->paginate(10);
			}else
			{
				if($request->location){
					$ubicacion = $request->location;
					$users = User::location($ubicacion);
				}
				else return back()->withInput();
			}
		}


		$industries = Industry::all();
        $categories = Category::all();
    	return view('talentos', compact('users', 'industries', 'categories'));


	}
}

