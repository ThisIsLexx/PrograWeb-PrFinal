<x-main-template titulo="titulo">

<h2>INFORMACIÓN SOBRE PEDIDO</h2>

<h3>Propietario del pedido: {{ $order->user->name }}</h3>

<h3>Cantidad de productos: {{ $order->cantidad_orden }}</h3>

<h3>Productos en pedido</h3>

@foreach($order->platillos as $platillo)
    <h4>{{ $platillo->nombre_platillo }} ........ ${{ $platillo->precio_platillo }}.00</h4>
@endforeach

<h3>TOTAL A PAGAR: ..... $ {{ $order->total_orden }}.00</h3>

</x-main-template>