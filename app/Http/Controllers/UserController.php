<?php

namespace Lunar\Http\Controllers;

use Session;
use Auth;
use Image;

use Lunar\User;
use Lunar\Address;
use Lunar\Wishlist;

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
        
        $user = Auth::user();
        $addresses = Address::where('user_id', $user->id)->get();
        $wishlist = Wishlist::where('user_id', $user->id)->get();

    	return view ('front.user-profile.index')->with('orders', $orders)->with('user', $user)->with('addresses', $addresses)->with('wishlist', $wishlist);

    }

    public function orders()
    {
        $orders = Auth::user()->orders;
        
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        
        $user = Auth::user();

        return view ('front.user-profile.orders.index')->with('orders', $orders)->with('user', $user);

    }

    public function addresses()
    {

        $user = Auth::user();
        $addresses = Address::where('user_id', $user->id)->get();

        return view ('front.user-profile.addresses.index')->with('user', $user)->with('addresses', $addresses);
    }

    public function createAddress()
    {
        return view ('front.user-profile.addresses.create');
    }

    public function storeAddress(Request $request)
    {
        // Validate
        $this -> validate($request, array(

        ));

        // Save request in database
        $address = new Address;
        $address->name = $request->name;
        $address->street = $request->street;
        $address->street_num = $request->street_num;
        $address->postal_code = $request->postal_code;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->phone = $request->phone;

        // Save on user_id on database
        $address->user_id = $request->user()->id;


        //$user = User::find($id);
        //$user->name = $request->name;

        // Check for user image

        // This is done using Intervention package for Larvel
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/user/' . $file_name);

            Image::make($image)->resize(600,null, function($constraint){ $constraint->aspectRatio(); })->save($location);

            $user->image = $file_name;
        }

        $address -> save();
        //$user -> save();

        alert()->success('Your profile was saved succesfully.', 'Success!')->persistent('Ok, thanks!');
        return redirect()->back();
    }




}
