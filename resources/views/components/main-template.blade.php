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
                        <a href="" class="nav-link text-light">Logout</a>    
                    </li>
                @endcan
                
                @cannot('loggedIn')
                    <li class="nav-item p-2">
                        <a href="" class="nav-link text-light">Login</a>
                    </li>
                @endcan

            </ul>
        </nav>
    </div>

    {{ $slot }}

    <script src="{{asset('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js')}}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>