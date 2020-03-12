<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'tuTaller') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                        @if (Auth::check() && Auth::user()->role->id == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cliente.create') }}">{{ __('Datos Personales') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cliente.dashboard') }}">{{ __('Historial') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cliente.dashboard') }}">{{ __('Nueva cita') }}</a>
                            </li>
                        @endif
                        @if (Auth::check() && Auth::user()->role->id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('taller.create') }}">{{ __('Datos Personales') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('taller.dashboard') }}">{{ __('Empleados') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('taller.dashboard') }}">{{ __('Citas') }}</a>
                        </li>
                        @endif
                        @if (Auth::check() && Auth::user()->role->id == 3)
                            <a class="nav-link" href="{{ route('concesionario.dashboard') }}">{{ __('Perfil') }}</a>
                        @endif
                        @if (Auth::check() && Auth::user()->role->id == 4)
                            <a class="nav-link" href="{{ route('compraventa.dashboard') }}">{{ __('Perfil') }}</a>
                        @endif
                        @if (Auth::check() && Auth::user()->role->id == 5)
                            <a class="nav-link" href="{{ route('cliente.dashboard') }}">{{ __('Perfil') }}</a>
                        @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Identificarse') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
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
                            <a class="dropdown-item" href="{{ route('password.change') }}">{{ __('Cambiar contraseña') }}</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesión') }}
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