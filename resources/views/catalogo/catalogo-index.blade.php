
<x-main-template titulo="Catalogo - Mariscos Cheo's">
    <br><br>
    <h1 class="text-center">Catalogo de precios</h1>
    <hr>
    <div class="container-fluid">
        <h5>Información de ayuda para el registro de platillos</h5>
    </div>
    @if(session('success'))
        <div class="container-fluid alert-success">
            {{ session('success') }}
        </div>
    @endif
    <hr>
    <div class="container-fluid">
    <table class="table table-bordered">
        <caption>Lista de catalogo registrado</caption>
        <thead class="thead-light">
            <tr>
                <th>Tipo de platillo</th>
                <th>Tamaño de platillo</th>
                <th>Precio del platillo</th>
                <th class="text-center">Acciones</th>
                <th class="text-center"><a href="/catalogo/create">Agregar</a></th>
            </tr>
        </thead>
        <tbody class="table-hover">
            @if(!empty($catalogo))
                @foreach($catalogo as $producto)
                    <tr>
                        <td>{{ $producto->tipo }}</td>
                        <td>{{ $producto->tam }}</td>
                        <td>${{ $producto->precio }}.00</td>

                        <td class="text-center">
                            <a class="btn btn-primary" href="/catalogo/{{ $producto->id }}/edit">Editar</a>
                        </td>
                        <td class="text-center">
                            <a href="">
                                <form action="/catalogo/{{ $producto->id }}" method="POST">
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

</x-main-template>