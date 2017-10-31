<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head prefix="og:http://ogp.me/ns#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('seo_options')

    <!-- SEO Options -->
    <title>{{ $seo_options->page_title }}</title>
    <meta name="description" content="{{ $seo_options->page_description }}">
    <meta name="keywords" content="{{ $seo_options->page_keywords }}">
    <meta name="robots" content="{{ $seo_options->page_google_robots }}">
    
    <!-- OG SEO -->
    <meta property="og:title" content="{{ $seo_options->page_title }}">
    <meta property="og:description" content="{{ $seo_options->page_description }}">
    <meta property="og:url" content="{{ $seo_options->page_url }}">
    <meta property="og:type" content="{{ $seo_options->page_og_type }}">
    <meta property="og:image" content="{{ asset($seo_options->page_logo) }}">

    <link rel="canonical" href="{{ $seo_options->page_canonical_url }}">
    <link rel="alternate" href="{{ $seo_options->page_alternate_url }}">

    <!-- Favicon Routes -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($seo_options->page_apple_touch_icon) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($seo_options->page_favicon_32_32) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($seo_options->page_favicon_16_16) }}">
    <link rel="manifest" href="{{ asset($seo_options->page_manifest_file) }}">
    <link rel="mask-icon" href="{{ asset($seo_options->page_safari_mask_icon) }}" color="{{ $seo_options->page_safari_mask_icon_color }}">
    <meta name="theme-color" content="{{ $seo_options->page_theme_color_hex }}">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
    @yield('stylesheets')
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset($seo_options->page_logo) }}" alt="{{ $seo_options->page_title }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('great-detail') }}">Catalog</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @guest
                                Account
                                @else
                                Welcome, {{ Auth::user()->name }}
                                @endguest
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @guest
                                <a class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                <a class="dropdown-item" href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Register</a>
                                @else
                                <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fa fa-user"></i> Profile</a>
                                <a class="dropdown-item" href="{{ route('profile.wishlist') }}"><i class="fa fa-star"></i> Your Wishlist</a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @endguest
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Shopping Cart
                            <span class="badge badge-primary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>

                            </a>
                        </li>

                        <form class="form-inline my-2 my-lg-0 ml-3" role="search" action="{{ route('search.query') }}">
                            <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>

        @include('partials._messages')

        @yield('content')

        @include('layouts.utilities.footer')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')

    @yield('scripts')
</body>
</html>
