<?php

namespace Lunar\Http\Controllers\Admin;

use Carbon\Carbon;

use Auth;
use Storage;

use Lunar\User;
use Lunar\Store\Order;

use Illuminate\Http\Request;
use Lunar\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
    	$clients = User::all();

    	$orders = Order::all();
        
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        $new_orders = Order::where('created_at', '>=', Carbon::now()->subWeek())->count();

        return view('back.orders.index')->with('clients', $clients)->with('orders', $orders)->with('new_orders', $new_orders);
    }

    public function show($id)
    {
    	$client = User::find($id);
    	$orders = $client->orders;
        
        $orders->transform(function($order, $key){
           $order->cart = unserialize($order->cart);
           return $order;
      	});

        return view('back.orders.show')->with('client', $client)->with('orders', $orders);
    }
}
