<x-main-template titulo="Platillos - Mariscos Cheo's">
    <br><br>
    <h1 class="text-center">Registro de platillos - Mariscos Cheo's</h1>
    <hr>
    <div class="container-fluid">
        <h5>Registros existentes sobre platillos</h5>
    </div>
    @if(session('success'))
        <div class="container-fluid alert-success">
            {{ session('success') }}
        </div>
    @endif
    <hr>

    <div class="container-fluid">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nombre del platillo</th>
                    <th>Tipo de platillo</th>
                    <th>Tamaño de platillo</th>
                    <th>Precio del platillo</th>
                    <th>Encargado del registro</th>
                    <th class="text-center">Acciones</th>
                    <th class="text-center"><a href="/platillo/create">Agregar</a></th>
                </tr>
            </thead>
            <tbody class="table-hover">
                @if(!empty($platillos))
                    @foreach($platillos as $platillo)
                        <tr>
                            <td><a href="/platillo/{{ $platillo->id }}">{{ $platillo->nombre_platillo }}</a></td>
                            <td>{{ $platillo->tipo_platillo }}</td>
                            <td>{{ $platillo->tam_platillo }}</td>
                            <td>${{ $platillo->precio_platillo }}.00</td>
                            <td>{{ $platillo->user->name }}</td>
    
                            <td class="text-center">
                                <a class="btn btn-primary" href="/platillo/{{ $platillo->id }}/edit">Editar</a>
                            </td>
                            <td class="text-center">
                                <a href="">
                                    <form action="/platillo/{{ $platillo->id }}" method="POST">
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