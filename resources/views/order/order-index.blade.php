<x-main-template titulo="titulo">

<h2>ORDENES - MARISCOS CHEOS</h2>

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@if(sizeof($orders) < 1)
    <h2>Aun no hay ordenes registradas!</h2><a href="/order/create">Agregar Orden</a>

@elseif(sizeof($orders) >= 1)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del pedido</th>
                <th>Dirección del pedido</th>
                <th>Fecha del pedido</th>
                <th>Cliente</th>
                <th>Cantidad de platillos</th>
                <th>Total de la orden</th>
                <th>Acciones</th>
                <th><a href="/order/create">Agregar</a></th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($orders))
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td><a href="/order/{{ $order->id }}">{{ $order->nombre_orden }}</a></td>
                        <td>{{ $order->direccion_orden }}</td>
                        <td>{{ $order->fecha_orden }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->cantidad_orden }}</td>
                        <td>{{ $order->total_orden }}</td>

                        <td><a href="/order/{{ $order->id }}/edit">Editar</a></td>
                        <td>
                            <a href="">
                                <form action="/order/{{ $order->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Eliminar">

                                </form>
                            </a>
                        </td>

                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endif


</x-main-template>