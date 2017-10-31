<?php

namespace Lunar\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use View;
use Lunar\Store\SEO;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $seo_options;

    public function __construct(){
    	$this->seo_options = SEO::find(1);
    	View::share('seo_options', $this->seo_options);
    }
}
