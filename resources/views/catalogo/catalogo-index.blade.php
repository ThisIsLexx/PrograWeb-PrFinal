
<x-main-template titulo="Catalogo de precios">

    <h1>INDEX</h1>

    <h4>Aqui se mostrara toda la información contenida en el catalogo de precios</h4>

    <table>
        <thead>
            <tr>
                <th>Tipo de platillo</th>
                <th>Tamaño de platillo</th>
                <th>Precio del platillo</th>
                <th>Acciones</th>
                <th><a href="/catalogo/create">Agregar</a></th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($catalogo))
                @foreach($catalogo as $producto)
                    <tr>
                        <td>{{ $producto->tipo }}</td>
                        <td>{{ $producto->tam }}</td>
                        <td>{{ $producto->precio }}</td>

                        <td><a href="/catalogo/{{ $producto->id }}/edit">Editar</a></td>
                        <td>
                            <a href="">
                                <form action="/catalogo/{{ $producto->id }}" method="POST">
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