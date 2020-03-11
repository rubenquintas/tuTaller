<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>tuTaller</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

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
                font-size: 5em;
            }
            
            .title > a {
                color: #636b6f;
                font-family: 'Amaranth', sans-serif;
                text-decoration: none;
            }
            .title > a:hover {
                color: purple;
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

            .carousel-caption {
                color: purple;
                font-weight: bold;
                font-size: 1.5em;
            }
            .carousel-caption h3 {
                color: purple;
                font-weight: bold;
                font-size: 1.5em;
            }

            .marketing {
                margin-top: 20px;
            }

            .marketing .btn-secondary {
                background-color: purple;
                border: none;
            }

            .footer {
                background-color: purple;
                color: #fff;
            }

            .footer > a {
                font-size: 2em;
                color: #fff;
                font-family: 'Amaranth', sans-serif;
                text-decoration: none;
            }

            .feedback input {
                border: solid 1px purple;
            }

            .btn-sm {
                border: solid 1px purple;
            }

            .rrss > a:hover {
                color: purple;
            }

        </style>
        
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </head>
    <body>

        <!-- aquí empieza el menu superior -->

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
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if (Auth::check() && Auth::user()->role->id == 1)
                                        <a class="dropdown-item" href="{{ route('cliente.dashboard') }}">{{ __('Perfil') }}</a>
                                    @endif
                                    @if (Auth::check() && Auth::user()->role->id == 2)
                                        <a class="dropdown-item" href="{{ route('taller.dashboard') }}">{{ __('Perfil') }}</a>
                                    @endif
                                    @if (Auth::check() && Auth::user()->role->id == 3)
                                        <a class="dropdown-item" href="{{ route('concesionario.dashboard') }}">{{ __('Perfil') }}</a>
                                    @endif
                                    @if (Auth::check() && Auth::user()->role->id == 4)
                                        <a class="dropdown-item" href="{{ route('compraventa.dashboard') }}">{{ __('Perfil') }}</a>
                                    @endif
                                    @if (Auth::check() && Auth::user()->role->id == 5)
                                        <a class="dropdown-item" href="{{ route('cliente.dashboard') }}">{{ __('Perfil') }}</a>
                                    @endif

                                    <!-- Botón para cambiar la contraseña, en el menú desplegable cuando se está registrado. -->
                                    <a class="dropdown-item" href="{{ route('password.change') }}">{{ __('Change Password') }}</a>

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

        <!-- Aqui empieza el contenido principal de la página -->

        <div class="position-ref">
            
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
                        <img class="d-block w-100" src="public/storage/taller1.jpg"
                            alt="First slide">
                        <div class="mask rgba-black-light"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive">Profesionalidad</h3>
                        <p>Lo más importante para nosotros es la profesionalidad.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view">
                        <img class="d-block w-100" src="public/storage/taller2.jpg"
                            alt="Second slide">
                        <div class="mask rgba-black-strong"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive">Trato cordial</h3>
                        <p>Es importante un trato profesional y al mismo cordial.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view">
                        <img class="d-block w-100" src="public/storage/taller3.jpg"
                            alt="Third slide">
                        <div class="mask rgba-black-slight"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive">Presupuestos ajustados</h3>
                        <p>Siempre buscamos la mejor calidad a los precios más competitivos.</p>
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

                <div class="marketing">

                    <!-- Three columns of text below the carousel -->
                    <div class="row">
                      <div class="col-lg-4">
                        <img class="rounded-circle" src="public/storage/perfil1.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2>Juan Hernández</h2>
                        <p>"Ha sido una muy buena experiencia, sin duda repetiré."</p>
                        <p><a class="btn btn-secondary" href="#" role="button">Empresa »</a></p>
                      </div><!-- /.col-lg-4 -->
                      <div class="col-lg-4">
                        <img class="rounded-circle" src="public/storage/perfil2.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2>Laura Gómez</h2>
                        <p>"Me han aconsejado fenomenal, un trato cordial y cercano."</p>
                        <p><a class="btn btn-secondary" href="#" role="button">Empresa »</a></p>
                      </div><!-- /.col-lg-4 -->
                      <div class="col-lg-4">
                        <img class="rounded-circle" src="public/storage/perfil3.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2>Andrea Fernández</h2>
                        <p>"No me he molestado en nada, me han recogido el coche en la puerta de mi trabajo."</p>
                        <p><a class="btn btn-secondary" href="#" role="button">Empresa »</a></p>
                      </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
            
            
                    <!-- START THE FEATURETTES -->
            
                    <hr class="featurette-divider">
            
                    <div class="row featurette">
                      <div class="col-md-7">
                        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                      </div>
                      <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_170c91df150%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_170c91df150%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22185.13333129882812%22%20y%3D%22261.1%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                      </div>
                    </div>
            
                    <hr class="featurette-divider">
            
                    <div class="row featurette">
                      <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                      </div>
                      <div class="col-md-5 order-md-1">
                        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_170c91df152%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_170c91df152%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22185.13333129882812%22%20y%3D%22261.1%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                      </div>
                    </div>
            
                    <hr class="featurette-divider">
            
                    <div class="row featurette">
                      <div class="col-md-7">
                        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                      </div>
                      <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_170c91df154%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_170c91df154%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22185.13333129882812%22%20y%3D%22261.1%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                      </div>
                    </div>
            
                    <hr class="featurette-divider">
            
                    <!-- /END THE FEATURETTES -->
            
                </div>
            </div>
        </div>

        <!-- aqui empieza el footer, tengo q ponerlo en otra seccion aparte y luego montarlo aqui -->
        <!-- Footer -->
        <footer class="page-footer font-small white darken-3 pt-4">

            <!-- Footer Elements -->
            <div class="container">

                <!--Grid row-->
                <div class="feedback row ml-5">

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
                        <button class="btn btn-sm" type="button">Sign up</button>
                        </div>
                    </form>
            
                    </div>
                    <!--Grid column-->
            
                </div>
                <!--Grid row-->
        
                <!-- Grid row-->
                <div class="row">
            
                    
                    <!-- Grid column -->
                    <div class="col-md-12 py-5 text-center">
                        <div class="text-center rrss">

                        <!-- Facebook -->
                        <a class="fb-ic">
                            <i class="fab fa-facebook-f fa-lg purple-text ml-3 md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fab fa-instagram fa-lg purple-text ml-2 md-5 mr-4 fa-2x"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic">
                            <i class="fab fa-twitter fa-lg purple-text md-5 mr-3 fa-2x"> </i>
                        </a>
                        </div>
                    </div>
                    <!-- Grid column -->
                            
                </div>
                <!-- Grid row-->
            
            </div>
            <!-- Footer Elements -->
        
            <!-- Copyright -->
            <div class="footer text-center py-3">
            <a href="{{ url('/') }}"> tuTaller</a><br>© 2020 Copyright
            </div>
            <!-- Copyright -->
        
        </footer>
        <!-- Footer -->
    </body>
</html>
