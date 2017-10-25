<?php

namespace Lunar\Http\Controllers\Admin;

use Carbon\Carbon;

use Auth;
use Storage;

use Lunar\User;
use Lunar\Address;
use Lunar\Wishlist;

use Illuminate\Http\Request;
use Lunar\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
    	$clients = User::all();

        $new_clients = User::where('created_at', '>=', Carbon::now()->subWeek())->count();

        return view('back.clients.index')->with('clients', $clients)->with('new_clients', $new_clients);
    }

    public function show($id)
    {
    	$client = User::find($id);
    	$wishlist = Wishlist::where('user_id', $client->id)->get();

    	$orders = $client->orders;
        
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('back.clients.show')->with('client', $client)->with('wishlist', $wishlist)->with('orders', $orders);
    }
}
