<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>tuTaller</title>

        <!-- mdbootstrap -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/css/mdb.min.css" rel="stylesheet">
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/js/mdb.min.js"></script>


        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            
            .title > a {
                color: #636b6f;
                font-family: 'Amaranth', sans-serif;
                text-decoration: none;
            }

            .links {
                margin-bottom: 10px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .links > a:hover {
                border-bottom: solid 2px purple;
            }

            .footer {
                background-color: purple;
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item btn-group dropdown">
                                @if (Auth::check() && Auth::user()->role->id == 1)
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('cliente.dashboard') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>
                                @endif
                                @if (Auth::check() && Auth::user()->role->id == 2)
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('taller.dashboard') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>
                                @endif
                                @if (Auth::check() && Auth::user()->role->id == 3)
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('concesionario.dashboard') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>
                                @endif
                                @if (Auth::check() && Auth::user()->role->id == 4)
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('compraventa.dashboard') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>
                                @endif
                                @if (Auth::check() && Auth::user()->role->id == 5)
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('recambios.dashboard') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>
                                @endif

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <!-- Botón para cambiar la contraseña, en el menú desplegable cuando se está registrado. -->
                                    <a class="dropdown-item" href="{{ route('password.change') }}">{{ __('Password') }}</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="position-ref full-height">
            
            <div class="content">
                <div class="title">
                <a href="{{ url('/') }}">tuTaller</a>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <!--Carousel Wrapper-->
                <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="view">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg"
                            alt="First slide">
                        <div class="mask rgba-black-light"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive">Light mask</h3>
                        <p>First text</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"
                            alt="Second slide">
                        <div class="mask rgba-black-strong"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive">Strong mask</h3>
                        <p>Secondary text</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg"
                            alt="Third slide">
                        <div class="mask rgba-black-slight"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive">Slight mask</h3>
                        <p>Third text</p>
                        </div>
                    </div>
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
                <!--/.Carousel Wrapper-->
            </div>
        </div>

        <!-- aqui empieza el footer, tengo q ponerlo en otra seccion aparte y luego montarlo aqui -->
        <!-- Footer -->
        <footer class="page-footer font-small white darken-3 pt-4">

            <!-- Footer Elements -->
            <div class="container">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 mb-4">
            
                    <!-- Form -->
                    <form class="form-inline">
                        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                        aria-label="Search">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </form>
                    <!-- Form -->
            
                    </div>
                    <!--Grid column-->
            
                    <!--Grid column-->
                    <div class="col-md-6 mb-4">
            
                    <form class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Your email"
                        aria-label="Your email" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-sm btn-outline-purple my-0" type="button">Sign up</button>
                        </div>
                    </form>
            
                    </div>
                    <!--Grid column-->
            
                </div>
                <!--Grid row-->
        
                <!-- Grid row-->
                <div class="row">
            
                    
                    <!-- Grid column -->
                    <div class="col-md-12 py-5">
                        <div class="mb-5 flex-center">

                        <!-- Facebook -->
                        <a class="fb-ic">
                            <i class="fab fa-facebook-f fa-lg purple-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic">
                            <i class="fab fa-twitter fa-lg purple-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Google +-->
                        <a class="gplus-ic">
                            <i class="fab fa-google-plus-g fa-lg purple-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic">
                            <i class="fab fa-linkedin-in fa-lg purple-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fab fa-instagram fa-lg purple-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Pinterest-->
                        <a class="pin-ic">
                            <i class="fab fa-pinterest fa-lg purple-text fa-2x"> </i>
                        </a>
                        </div>
                    </div>
                    <!-- Grid column -->
                            
                </div>
                <!-- Grid row-->
            
            </div>
            <!-- Footer Elements -->
        
            <!-- Copyright -->
            <div class="footer text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        
        </footer>
        <!-- Footer -->
    </body>
</html>
