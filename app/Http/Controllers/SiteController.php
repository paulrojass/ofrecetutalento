<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Traits\DatesTranslator;


use DB;

use App\Plan;
use App\Industry;
use App\Category;

use App\User;
use App\Talent;
use App\Exchange;
use App\Dealing;
    
use Carbon\Carbon;
 
class SiteController extends Controller
{
    use DatesTranslator;

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
        $usuarios = User::count();
        $talentos = Talent::count();
        $canjes = Exchange::count();
        $tratos = Dealing::count();
        return view('quienes-somos', compact('usuarios', 'talentos', 'canjes', 'tratos'));
    }

    public function terminos()
    {
        return view('terminos');
    }


    public function suscripcion(Request $request)
    {
        $plans = Plan::all();
        $industries = Industry::all();
        $paises_json = file_get_contents(base_path('resources/json/paises.json'));
        $paises = json_decode($paises_json, true);

        return view('suscripcion', compact('plans', 'industries', 'paises'));
    }

    public function suscripcionTalentos(Request $request)
    {
        $categories = Category::all();
        return view('suscripcion-talentos', compact('categories'));
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

    public function perfilTalentos()
    {
        
        return view('content.mi-cuenta-talentos');
    }

    public function perfilCanjes()
    {
        $exchanges = Auth()->User()->exchanges;
        
        return view('content.mi-cuenta-canjes', compact('exchanges'));
    }

    public function perfilRecibidos()
    {
        $recibidos = Dealing::where('accept_id', auth()->user()->id)->get();
        
        return view('content.mi-cuenta-tratos-r', compact('recibidos'));
    }

    public function perfilPropuestos()
    {
        $propuestos = Dealing::where('propose_id', auth()->user()->id)->get();
        
        return view('content.mi-cuenta-tratos-p', compact('propuestos'));
    }

    public function formInfo()
    {
        return view('forms.mi-cuenta-perfil');
    }
}