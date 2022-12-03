<x-main-template titulo="Mis pedidos">
    <div class="container">
        <br><br>
        <h2 class="text-center">Mis pedidos</h2>
        <hr>
            @if(sizeof($orders) < 1)
                <h3 class="text-center">Aun no has realizado ningún pedido!</h3>
                <h3 class="text-center">:(</h3>
                <br><br>
                <div class="text-center">
                    <a class="btn btn-primary" href="/order/create">Hacer pedido</a>
                </div>
                <hr>
            @else
                <ul>
                    @foreach($orders as $order)
                        <div class="row"></div>    
                    <a href="/order/{{ $order->id }}" class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                        {{ $order->nombre_orden }}
                        <p>Fecha de entrega: <span class="badge badge-secondary badge-pill">{{ $order->fecha_orden }}</span></p>
                        
                    </a>
                    @endforeach
                </ul>
            @endif

    </div>    



</x-main-template>