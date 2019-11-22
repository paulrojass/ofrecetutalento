<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
use App\Industry;
use App\Category;

use App\User;
use App\Talent;

class SiteController extends Controller
{
    public function suscripcion(Request $request)
    {
        $plans = Plan::all();
        $industries = Industry::all();
        return view('suscripcion', compact('plans', 'industries'));
    }

    public function talentos(Request $request)
    {
    	$users = User::all();
    	return view('talentos', compact('users'));
    }
}
