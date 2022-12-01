<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/styles.css')}}">
</head>

<body>

    <div class="wrapper">
        <div class="navbar">
            <!-- <img src="#" alt="" width=""> -->
            <p>LOGOTIPO</p>

            @can('navBar')
                <a class="navigation" href="/catalogo">Catalogo</a>
                <a href="/platillo">Platillos</a>
                <a href="/order">Pedidos</a>
            @endcan
            <a href="/menu">Menu</a>
            <a href="/order/create">Hacer pedido</a>
            <a href="/misPedidos">Mis pedidos</a>
        </div>
    </div>

    {{ $slot }}

<x-Footer/>

</body>

</html>