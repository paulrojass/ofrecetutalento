<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;

class SiteController extends Controller
{
    public function suscripcion(Request $request)
    {
        $plans = Plan::all();
        return view('suscripcion', compact('plans'));
    }
}
