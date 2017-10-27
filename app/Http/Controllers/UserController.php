<?php

namespace Lunar\Http\Controllers;

use Session;
use Auth;
use Image;
use Storage;

use Lunar\User;
use Lunar\Address;
use Lunar\Wishlist;

use Lunar\Store\Order;
use Lunar\Store\Country;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
    	//$orders = Auth::user()->orders;
    	
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->paginate(3);

        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        
        
        $addresses = Address::where('user_id', $user->id)->get();
        $wishlist = Wishlist::where('user_id', $user->id)->get();

    	return view ('front.user-profile.index')->with('orders', $orders)->with('user', $user)->with('addresses', $addresses)->with('wishlist', $wishlist);
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view ('front.user-profile.edit')->with('user', $user);
    }

    public function updateProfile(Request $request, $id)
    {
        // Validar los datos
        $this -> validate($request, array(

        ));

        // Guardar datos a la BD, usar el modelo con funcion find() para encontrar el elemento que estamos editabdo por medio del ID
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        // Mensaje de aviso server-side
        Session::flash('success', 'Your account was succesfully updated.');

        alert()->success('Your profile was saved succesfully.', 'Success!')->persistent('Ok, thanks!');

        return redirect()->route('profile.index');
    }

    public function editImage()
    {
        $user = Auth::user();

        return view ('front.user-profile.user-image')->with('user', $user);
    }

    public function updateImage(Request $request, $id)
    {
        $this -> validate($request, array(

        ));

        $user = User::find($id);
        
        $user->image = $request->user_imagen;

        if ($request->hasFile('user_image')) {
            $user_image = $request->file('user_image');
            $filename = 'user_img' . time() . '.' . $user_image->getClientOriginalExtension();
            $location = public_path('img/users/' . $filename);

            Image::make($user_image)->resize(400,null, function($constraint){ $constraint->aspectRatio(); })->save($location);

            $user->image = $filename;
        }

        $user->save();

        Session::flash('success', 'Your profile picture was succesfully updated.');

        alert()->success('Your profile picture was saved succesfully.', 'Success!')->persistent('Ok, thanks!');

        return redirect()->route('profile.index');
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
        $countries = Country::all();

        return view ('front.user-profile.addresses.create')->with('countries', $countries);
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
        $address->country = $request->country;
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
        return redirect()->route('profile.address.index');
    }




}
