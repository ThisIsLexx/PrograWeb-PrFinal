<x-main-template titulo="Platillo Index">


<a href="/platillo/create">Agregar nuevo platillo</a>



<h1>INDEX PLATILLOS</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre del precio_platillo</th>
                <th>Tipo de platillo</th>
                <th>Tamaño de platillo</th>
                <th>Precio del platillo</th>
                <th>Encargado del registro</th>
                <th>Acciones</th>
                <th><a href="/catalogo/create">Agregar</a></th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($platillos))
                @foreach($platillos as $platillo)
                    <tr>
                        <td>{{ $platillo->nombre_platillo }}</td>
                        <td>{{ $platillo->tipo_platillo }}</td>
                        <td>{{ $platillo->tam_platillo }}</td>
                        <td>{{ $platillo->precio_platillo }}</td>
                        <td>{{ $platillo->user->name }}</td>

                        <td><a href="/platillo/{{ $platillo->id }}/edit">Editar</a></td>
                        <td>
                            <a href="">
                                <form action="/platillo/{{ $platillo->id }}" method="POST">
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

</x-main-template>