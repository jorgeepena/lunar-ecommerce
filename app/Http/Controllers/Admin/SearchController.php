<?php

namespace Lunar\Http\Controllers\Admin;


use DB;
use Auth;

use Lunar\Store\Order;
use Lunar\User;
use Lunar\Store\Product;

use Illuminate\Http\Request;
use Lunar\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function query(Request $request)
    {	
    	$query = $request->input('query');

    	$clients = User::where(DB::raw('name'), 'LIKE', "%{$query}%")
    		->orWhere('email', 'LIKE', "%{$query}%")
    		->get();

    	$products = Product::where(DB::raw('name'), 'LIKE', "%{$query}%")
    		->orWhere('sku', 'LIKE', "%{$query}%")
    		->get();

        return view('back.search.query')->with('clients', $clients)->with('products', $products);
    }

    public function orderQuery(Request $request)
    {   
        $query = $request->input('query');

        $orders = Order::where(DB::raw('id'), 'LIKE', "%{$query}%")
            ->orWhere('payment_id', 'LIKE', "%{$query}%")
            ->orWhere('created_at', 'LIKE', "%{$query}%")
            ->orWhere('client_name', 'LIKE', "%{$query}%")
            ->get();

        $orders->transform(function($order, $key){
           $order->cart = unserialize($order->cart);
           return $order;
        });

        return view('back.search.orderquery')->with('orders', $orders);
    }
}
