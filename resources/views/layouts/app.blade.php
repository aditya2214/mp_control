<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trafalgar Shop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" /> -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet"> -->
    
</head>
<body style="background-image: url('http://localhost/mp_control/public/img/1.jpg');">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img src="{{url('img/NicePng_pirates-logo-png_733347.png')}}" width="5%" alt=""> &nbsp;&nbsp;&nbsp;
                <p class="navbar-brand">
                    Trafalgar Shop
                </p>
                <div class="text-center" >
                    <a href="{{url('/home')}}"class="btn btn-sm btn-outline-secondary" href="">Belanja</a>
                    <a class="btn btn-sm btn-outline-secondary" href="">Profil Anda</a>
                    <a class="btn btn-sm btn-outline-secondary" href="">Tentang Kami</a>
                    <a class="btn btn-sm btn-outline-secondary" href="">Hubungi Kami</a>
                    <a class="btn btn-sm btn-outline-primary" href="{{ url('keranjang') }}">Keranjang Belanja</a>

                </div>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

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
                            <li class="nav-item dropdown" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <style>
                                    #block {
                                        display: block;
                                        width: 100%;
                                        border: none;
                                        background-color: red;
                                        padding: 14px 28px;
                                        font-size: 16px;
                                        cursor: pointer;
                                        text-align: center;
                                        }
                                </style>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <img style="margin-left:50%;" src="{{url('storage/'.Auth::user()->avatar)}}" width="25%"alt="">
                                    <a style="margin-top:20px; text-align:center;" class="btn btn-danger btn-sm" id="block" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if(Auth::user()->role_id== 3)
                                    <a class="dropdown-item" href="{{ url('admin') }}">
                                        Admin
                                    </a>
                                    @endif
                                    @if(Auth::user()->role_id== 1)
                                    <a class="dropdown-item" href="{{ url('admin') }}">
                                        Admin
                                    </a>
                                    @endif

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
                                        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
@yield('script')
</html>
    