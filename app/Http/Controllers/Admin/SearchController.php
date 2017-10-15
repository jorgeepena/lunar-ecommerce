<?php

namespace Lunar\Http\Controllers\Admin;


use DB;
use Auth;

use Lunar\User;
use Lunar\Product;

use Illuminate\Http\Request;
use Lunar\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function query(Request $request)
    {	
    	$query = $request->input('query');

    	$clients = User::where(DB::raw('name'), 'LIKE', "%{$query}%")
    		->orWhere('user', 'LIKE', "%{$query}%")
    		->orWhere('company', 'LIKE', "%{$query}%")
    		->get();

    	$products = Product::where(DB::raw('name'), 'LIKE', "%{$query}%")
    		->orWhere('description', 'LIKE', "%{$query}%")
    		->orWhere('sku', 'LIKE', "%{$query}%")
    		->get();

        return view('search.query')->with('clients', $clients)->with('products', $products);
    }
}
