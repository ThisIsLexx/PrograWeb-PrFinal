<x-main-template titulo="Pedidos - Mariscos Cheo's">
<br><br>
<h1 class="text-center">Pedidos - Mariscos Cheo's</h1>
<hr>
<div class="container-fluid">
    <h5>Información sobre los pedidos de usuarios</h5>
</div>

@if(session('success'))
    <div class="container-fluid alert-success">
        {{ session('success') }}
    </div>
@endif
<hr>
@if(sizeof($orders) < 1)
    <div class="container-fluid">
        <h2>Aun no hay ordenes registradas!</h2><a class="btn btn-primary" href="/order/create">Agregar Orden</a>
    </div>    

@elseif(sizeof($orders) >= 1)
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre del pedido</th>
                    <th>Dirección del pedido</th>
                    <th>Fecha del pedido</th>
                    <th>Cliente</th>
                    <th>Cantidad de platillos</th>
                    <th>Total de la orden</th>
                    <th class="text-center">Acciones</th>
                    <th class="text-center"><a href="/order/create">Agregar</a></th>
                </tr>
            </thead>
            <tbody class="table-hover">
                @if(!empty($orders))
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td><a href="/order/{{ $order->id }}">{{ $order->nombre_orden }}</a></td>
                            <td>{{ $order->direccion_orden }}</td>
                            <td>{{ $order->fecha_orden }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->cantidad_orden }}</td>
                            <td>${{ $order->total_orden }}.00</td>
    
                            <td class="text-center">
                                <a class="btn btn-primary" href="/order/{{ $order->id }}/edit">Editar</a>
                            </td>
                            <td class="text-center">
                                <a href="">
                                    <form action="/order/{{ $order->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
    
                                        <input class="btn btn-danger" type="submit" value="Eliminar">
    
                                    </form>
                                </a>
                            </td>
    
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endif


</x-main-template>