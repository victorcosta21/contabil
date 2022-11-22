<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contabil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-mask.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body id="body-pd">
    <header class="header" id="header" style="background-color: white !important;border-bottom: solid; border-width: 2px;"> 
        <div class="header_toggle" style="color: black;"> 
            <i class='bx bx-menu' id="header-toggle"></i> 
        </div>
        <div class="header_img"> 
            <img src="https://i.imgur.com/hczKIze.jpg" alt=""> 
        </div>
    </header>
    <div id="app">
        <div class="l-navbar" id="nav-bar" style="background-color: #ffffff !important; border-right: solid; border-width: 2px;">
            <nav class="nav">
                <div> 
                    <a href="{{ route('home') }}" class="nav_logo"> 
                        <i class='bx bx-layer nav_logo-icon' style="color: black;"></i> 
                        <span class="nav_logo-name" style="color: black;">Contabil</span> 
                    </a>
                    <div class="nav_list"> 
                        <a href="#" class="nav_link" onclick="alert('Em Desenvolvimento!')" style="color: black;"> 
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name">Usuários</span> 
                        </a> 
                        <a href="{{ route('management') }}" class="nav_link" style="color: black;">
                            <i class="fa fa-building nav_icon" aria-hidden="true"></i>
                            <span class="nav_name">Gestão</span> 
                        </a>
                        <a href="{{ route('register-client') }}" class="nav_link" style="color: black;"> 
                            <i class="fa fa-money nav_icon" aria-hidden="true"></i>
                            <span class="nav_name">Inadimplentes</span> 
                        </a>
                        <a href="#" class="nav_link" onclick="alert('Em Desenvolvimento!')" style="color: black;"> 
                            <i class="fa fa-archive nav_icon" aria-hidden="true"></i>
                            <span class="nav_name">Estoque</span>
                        </a>
                    </div>
                </div> 
                <a href="{{ route('logout') }}" class="nav_link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out nav_icon' style="color: black;"></i> 
                    <span class="nav_name" style="color: black;">Deslogar</span> 
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
                        {{-- <a class="nav-link btn btn-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color:white;background-color:#fd3e3e;">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> --}}
