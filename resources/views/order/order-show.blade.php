<x-main-template titulo="titulo">

<div class="container">
    <br><br>
    <h2 class="text-center">INFORMACIÓN SOBRE PEDIDO</h2>
    <hr>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">{{ $order->nombre_orden }}</h3>
        </div>
        <div class="card-body">
            <h4>Propietario del pedido: {{ $order->user->name }}</h4>
            <hr>
            <h4 class="text-center">Datos de envio</h4>
            <hr>
            
            <h4 class="text-center">Dirección</h4>
            <h5>Calle: {{ $order->direccion_orden }}</h5>
            <h5>Codigo postal: {{ $order->codigoP_orden }}</h5>
            <hr>
            
            
            <h4 class="text-center">Información del pedido</h4>
            <h5>Productos en pedido: {{ $order->cantidad_orden }}</h5>
            
            @foreach($order->platillos as $platillo)
                <h5 class="text-center">{{ $platillo->nombre_platillo }} ........ ${{ $platillo->precio_platillo }}.00</h5>
            @endforeach
            <hr>
            <h4 class="text-center">TOTAL A PAGAR: ..... $ {{ $order->total_orden }}.00</h4>
            
            @if(Auth::user()->rol == "user")
            <a class="btn btn-secondary" href="/misPedidos">Volver</a>
            @else
                <a class="btn btn-secondary" href="/order">Volver</a>
            @endif
        </div>
    </div>
    
    
    
</div>


</x-main-template>