<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lunar Admin</title>

    <!-- Styles -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/back/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/back/custom.css') }}">

    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

    @yield('stylesheets')

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

            <script>
            function startTime() {

                // RELOJ
                var time = new Date();
                var h = time.getHours();
                var m = time.getMinutes();
                var s = time.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('clock').innerHTML =
                h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);

                // FECHA
                var today = new Date();

                var month = new Array();
                month[0] = "Enero";
                month[1] = "Febrero";
                month[2] = "Marzo";
                month[3] = "Abril";
                month[4] = "Mayo";
                month[5] = "Junio";
                month[6] = "Julio";
                month[7] = "Agosto";
                month[8] = "Septiembre";
                month[9] = "Octubre";
                month[10] = "Noviembre";
                month[11] = "Dicimebre";

                var dd = today.getDate();
                var mm = month[today.getMonth()];
                var yyyy = today.getFullYear();

                if(dd<10) {
                    dd = '0'+dd
                } 

                if(mm<10) {
                    mm = '0'+mm
                } 

                //today = mm + '/' + dd + '/' + yyyy;

                document.getElementById('date').innerHTML = dd + ' de ' + mm + ' ' + yyyy;

            }
            function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }

            
        </script>

</head>
<body onload="startTime()">

    <div class="container">
        <div class="row">
            <div class="col col-md-3 pt-5">
                <nav>
                    @if (Auth::guest())
                        <!--
                        <li><a href="{{ route('admin.login') }}">Login</a></li>
                        <li><a href="{{ route('admin.register') }}">Register</a></li>
                        -->
                        <ul class="nav flex-column">
                            <li>
                                <a href="{{ url('/admin') }}">
                                    <img class="mt-3 pr-5 img-fluid" src="{{ asset('img/logo-white.png') }}">
                                    <p class="text-right text-uppercase mb-5 pr-5">DASHBOARD</p>
                                </a>
                            </li>
                            <br>
                            <br>
                            <br>
                            <li>
                                <h2>Welcome to Lunar Admin Dashboard</h2>
                            </li>
                            <br>
                            <br>
                            <hr>
                            <li class="info">
                                <h5 id="clock"></h5>
                                <h6 id="date"></h6> 
                            </li>
                        </ul>
                        
                    @else
                    <ul class="nav flex-column">
                        <li>
                            <a href="{{ url('/admin') }}">
                                <img class="mt-3 pr-5 img-fluid" src="{{ asset('img/logo-white.png') }}">
                                <p class="text-right text-uppercase mb-5 pr-5">DASHBOARD</p>
                            </a>
                        </li>
                        <li>
                           <form class="form-inline" role="search" action="#">
                              <div class="input-group">
                                <input type="search" name="query" class="form-control" placeholder="Estoy buscando...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="ionicons ion-android-search"></i></button>
                                </span>
                            </div>
                            </form>
                        </li>

                        <hr>
                        <br>
                        <br>
                        <li class="title">
                            <h5>MENU</h5>
                            <hr>
                        </li>

                        <li><a class="nav-link flex-sm-fill" href="{{ url('/admin') }}"><i class="ionicons ion-stats-bars"></i> General View</a></li>

                  
                    </ul>
                    @endif
                </nav>
            </div>

            <div class="col col-md-9 pt-5 pl-5">
                @yield('content')
            </div>
        </div>
    </div>        


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <!--<script src="{{ asset('js/app.js') }}"></script>-->

    <!--<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>-->

    @yield('scripts')
</body>
</html>