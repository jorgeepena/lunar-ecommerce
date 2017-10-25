<?php

namespace Lunar\Http\Controllers\Admin;

use Session;
use Auth;
use Carbon\Carbon;

use Lunar\Admin;

use Illuminate\Http\Request;
use Lunar\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function adminList()
    {
        $admins = Admin::all();

        return view('back.auth.index')->with('admins', $admins);
    }

	public function register()
    {
    	return view('back.auth.register');
    }

    public function postRegister(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'email|required|unique:admins',
    		'password' => 'required|min:4',
    	]);

    	$admin = new Admin([
    		'name' => $request->input('name'),
    		'email' => $request->input('email'),
    		'password' => bcrypt($request->input('password')),
    	]);

    	$admin->save();

        Auth::guard('admin')->login($admin);

        if (Session::has('oldUrl')) {

            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }
        
    	return redirect()->route('admin.dashboard');
    }

    public function login()
    {
    	return view('back.auth.login');
    }

    public function postLogin(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'email|required',
    		'password' => 'required|min:4',
    	]);

    	if (Auth::guard('admin')->attempt([
    		'email' => $request->input('email'),
    		'password' => $request->input('password'),
    	])) {

            if (Session::has('oldUrl')) {

                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }

    		return redirect()->route('admin.dashboard');	
    	}

    	return redirect()->back();
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();

    	return redirect()->route('admin.login');
    }
}
