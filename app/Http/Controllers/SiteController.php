<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $industries = Industry::all();
        $categories = Category::all();
    	$users = User::paginate(10);
    	return view('talentos', compact('users', 'industries', 'categories'));
    }

    public function canjes(Request $request)
    {
        $industries = Industry::all();
        $categories = Category::all();
        $exchanges = Exchange::paginate(10);
        return view('canjes', compact('exchanges', 'industries', 'categories'));
    }
}
