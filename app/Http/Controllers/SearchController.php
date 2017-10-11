<?php

namespace Lunar\Http\Controllers;

use DB;
use Auth;

use Lunar\User;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function query(Request $request)
    {	
    	$query = $request->input('query');

    	$clientes = User::where(DB::raw('name'), 'LIKE', "%{$query}%")
    		->orWhere('user', 'LIKE', "%{$query}%")
    		->orWhere('company', 'LIKE', "%{$query}%")
    		->get();

        return view('search.query')->with('clientes', $clientes);
    }
}
