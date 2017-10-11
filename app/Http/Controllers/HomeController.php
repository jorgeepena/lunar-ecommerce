<?php

namespace Lunar\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
		$products = Product::all()->take(3);
		return view('home')->with('products', $products);
    }
}
