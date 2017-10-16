<?php

namespace Lunar\Http\Controllers;

use Session;
use Auth;
use Lunar\Store\Cart;
use Lunar\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
    	$orders = Auth::user()->orders;
    	
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        

    	return view ('user-profile.index')->with('orders', $orders);

    }
}
