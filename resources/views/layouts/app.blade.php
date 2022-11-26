<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href={{ asset("/pictures/logo.png") }}>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Scripts -->
    @if (Session::get("theme") === "light")
        @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @endif
    @if (Session::get("theme") === "dark")
        @vite(['resources/sass/app.scss', 'resources/css/dark-app.css', 'resources/js/app.js'])
    @endif
    <script src="https://kit.fontawesome.com/736804efb5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app" class="min-vh-100 container-fluid row justify-content-center p-4_5 bg-dark text-light">
        <nav class="border-bottom border-dark navbar rounded-top d-flex p-0 min-vh-10">
            <div class="col-3 h-100 d-flex align-items-center justify-content-center bg-secondary">
                <a class="navbar-brand m-0 d-flex align-items-center h75" href="{{ url('/') }}">
                    <h3 class="m-0 p-0 text-success">{{ config('app.name', 'Laravel') }}</h3>
                </a>
            </div>
            <div class="col-9 bg-gray h-100 d-flex align-items-center rounded-top-end justify-content-between border-start border-dark" id="navbarSupportedContent">
                <div class="">
                    <ul class="nav mr-auto d-flex align-items-center">
                        <li class="nav-item">
                          <a class="nav-link" href="#"><img src={{ asset("/pictures/icons/search.png") }} alt=""></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><img src={{ asset("/pictures/icons/fav.png") }} alt=""></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><img src={{ asset("/pictures/icons/obshalka.png") }} alt=""></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><img src={{ asset("/pictures/icons/faq.png") }} alt=""></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Session::get("theme") === "light" ? "text-dark" : "text-light"; }}" onclick="event.preventDefault(); document.getElementById('theme-form').submit();" href="#"><h1><i class="fa-solid fa-moon" ></i></h1></a>
                          <form id="theme-form" action="{{ route("theme", ['local' => url()->current()]) }}" method="POST">
                            @csrf
                          </form>
                        </li>
                    </ul>
                </div>
                <div class="col-3 d-flex justify-content-center">
                    @guest
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="btn btn-outline-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Auth 
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">    
                            @if (Route::has('login'))
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            @endif
                            @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>  
                            @endif
                        </div>
                    </div>
                    @else
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <div class="container d-flex p-0 min-vh-80">
            <div class="col-3">
                    <div class="card border-0 rounded-0 bg-secondary h-100 d-flex flex-column align-items-center">
                        <div class="card-body">
                            <h3 class="d-flex align-items-center gap-2"><img src={{ asset("/pictures/icons/left-menu.png") }} alt=""> Categories:</h3>
                        </div>
                    </div>                
            </div>
            <main class="col-9 border-start border-dark">
                @yield('content')
            </main>
        </div>

        <footer class="navbar navbar-expand-md navbar-light bg-secondary shadow-sm rounded-bottom min-vh-10 border-top border-dark">
            <div class="container">            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto text-success">
                        <li><h5>Copyright &copy; 2022 | Design by Roman Maxim</h5></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item "><a class="nav-link link-success" href="https://www.facebook.com/maxim.roman.18" target="_blank"><h5><i class="fa-brands fa-facebook-f"></i></h5></a></li>
                        <li class="nav-item"><a class="nav-link link-success" href="https://www.linkedin.com/in/maxim-roman-392888253/" target="_blank"><h5><i class="fa-brands fa-linkedin-in"></i></h5></a></li>
                        <li class="nav-item"><a class="nav-link link-success" href="https://github.com/MaximRoman" target="_blank"><h5><i class="fa-brands fa-github"></i></h5></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
