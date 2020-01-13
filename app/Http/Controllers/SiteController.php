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
    
use Carbon\Carbon;
 
class SiteController extends Controller
{
    public function principal(Request $request)
    {
        $industries = Industry::all();
        $tops = User::latest()->take(10)->get();
        return view('principal', compact('tops','industries'));
    }

    public function howItWorks()
    {
        return view('como-funciona');
    }

    public function planes()
    {
        $plans = Plan::all();
        return view('planes', compact('plans'));
    }

    public function quienesSomos()
    {
        return view('quienes-somos');
    }

    public function terminos()
    {
        return view('terminos');
    }


    public function suscripcion(Request $request)
    {
        $plans = Plan::all();
        $industries = Industry::all();
        return view('suscripcion', compact('plans', 'industries'));
    }

    public function suscripcionTalentos(Request $request)
    {
        $industries = Industry::all();
        return view('suscripcion-talentos', compact('industries'));
    }

    public function talentos(Request $request)
    {
        $categories = Category::all();
    	$users = User::paginate(10);
    	return view('talentos', compact('users','categories'));
    }

    public function canjes(Request $request)
    {
        $categories = Category::all();
        $exchanges = Exchange::paginate(10);

        $dia = Carbon::now()->subDay();
        $semana = Carbon::now()->subWeek();
        $quincena = Carbon::now()->subWeeks(2);
        $mes = Carbon::now()->subMonths();

        return view('canjes', compact('exchanges', 'categories', 'dia', 'semana', 'quincena', 'mes'));
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

    public function actualizarTalentos()
    {
        return view('filtros.suscripcion-talentos');

    }

    public function perfilInfo()
    {
        return view('content.mi-cuenta-perfil');
    }

    public function formInfo()
    {
        return view('forms.mi-cuenta-perfil');
    }
}