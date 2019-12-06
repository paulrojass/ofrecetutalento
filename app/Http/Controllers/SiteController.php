<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Plan;
use App\Industry;
use App\Category;

use App\User;
use App\Talent;
use App\Exchange;

class SiteController extends Controller
{
    public function principal(Request $request)
    {
        $industries = Industry::all();
        $tops = User::latest()->take(10)->get();
        return view('principal', compact('tops','industries'));
    }

    public function suscripcion(Request $request)
    {
        $plans = Plan::all();
        $industries = Industry::all();
        return view('suscripcion', compact('plans', 'industries'));
    }

    public function talentos(Request $request)
    {
        $categories = Category::all();
    	$users = User::paginate(10);
    	return view('talentos', compact('users','categories'));
    }

    public function canjes(Request $request)
    {
        $industries = Industry::all();
        $categories = Category::all();
        $exchanges = Exchange::paginate(10);
        return view('canjes', compact('exchanges', 'industries', 'categories'));
    }

    public function paginationTalents()
    {
        $users = DB::table('users')->paginate(10);
        $categories = Category::all();
        return view('filtros.talentos', compact('users', 'categories'));
    }

    public function fetch_data_talents(Request $request)
    {
        if($request->ajax())
        {
            $users = DB::table('users')->paginate(10);
            $categories = Category::all();
            return view('filtros.talentos', compact('users', 'categories'))->render();
        }
    }
}
