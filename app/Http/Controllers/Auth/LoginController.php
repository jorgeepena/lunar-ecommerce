<?php

namespace Lunar\Http\Controllers\Auth;

use Lunar\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use View;
use Lunar\Store\SEO;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $seo_options;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->seo_options = SEO::find(1);
        View::share('seo_options', $this->seo_options);
    }
}
