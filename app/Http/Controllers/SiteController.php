<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
use App\Industry;
use App\Category;

class SiteController extends Controller
{
    public function suscripcion(Request $request)
    {
        $plans = Plan::all();
        $industries = Industry::all();
        $categories = Category::all();
        return view('suscripcion', compact('plans', 'industries', 'categories'));
    }
}
