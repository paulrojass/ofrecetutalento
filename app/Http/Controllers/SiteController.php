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
        $industries = Industry::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        $categories = Category::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        return view('suscripcion', compact('plans', 'industries', 'categories'));
    }
}
