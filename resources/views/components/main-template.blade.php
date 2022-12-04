<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $titulo }}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">

    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
                <a class="navbar-brand text-light" href="/menu">
                <img src="{{asset('/assets/img/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                    Mariscos Cheos
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @can('navBar')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/catalogo">Catalogo</a>
                        <a class="dropdown-item" href="/platillo">Platillos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/order">Gestionar ordenes</a>
                        </div>
                    </li>
                    @endcan
    
                    @can('loggedIn')
                    <li class="nav-item">
                        <a class="nav-link" href="/misPedidos">Mis pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/order/create">Realizar pedido</a>
                    </li>
                    
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input class="btn btn-link nav-link" type="submit" value="Cerrar Sesión">
                        </form>
                    </li>

                    @endcan

                    @cannot('loggedIn')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Inicia Sesión</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                    </li>
                    @endcan
                    
                </ul>
            </div>
        </nav>
    </div>



    <!-- <div class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex" styles="background-color: #e3f2fd;">
            <div class="mr-auto p2">
                <a class="navbar-brand text-light" href="/menu">
                <img src="{{asset('/assets/img/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                    Mariscos Cheos
                </a>
            </div>
    
            <ul class="nav">
                @can('navBar')
                    <li class="nav-item p-2">
                        <a href="/catalogo" class="nav-link text-light">Catalogo</a>
                    </li>
                    <li class="nav-item p-2">
                        <a href="/platillo" class="nav-link text-light">Platillos</a>
                    </li>
                    <li class="nav-item p-2">
                        <a href="/order" class="nav-link text-light">Pedidos</a>
                    </li>
                @endcan

                @can('loggedIn')
                    <li class="nav-item p-2">
                        <a href="/order/create" class="nav-link text-light">Hacer pedido</a>
                    </li>
                    <li class="nav-item p-2">
                        <a href="/misPedidos" class="nav-link text-light">Mis pedidos</a>
                    </li>
                    <li class="nav-item p-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input class="btn btn-link nav-link text-light" type="submit" value="Cerrar Sesión">
                        </form>    
                    </li>
                @endcan
                
                @cannot('loggedIn')
                    <li class="nav-item p-2">
                        <a href="{{ route('login') }}" class="nav-link text-light">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item p-2">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link text-light">Regístrate</a>
                        @endif
                    </li>
                @endcan
            </ul>
        </nav>
    </div> -->

    {{ $slot }}

    <script src="{{asset('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js')}}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>