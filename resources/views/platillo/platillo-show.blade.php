<x-main-template titulo="Mostrar platillo - {{ $platillo->nombre_platillo }}">
    <div class="container">
        <br><br>
        <div class="card">
            <div class="card-header">
                <h2>{{ $platillo->nombre_platillo }}</h2>
            </div>
            <div class="card-body">
                <h4>Encargado del registro: {{ $platillo->user->name }}</h4>
                <hr>
                <h4 class="text-center">Información del platillo</h4>
                
                <ul>
                    <li>Nombre del platillo: {{ $platillo->nombre_platillo }}</li>
                    <li>Tipo de platillo: {{ $platillo->tipo_platillo }} </li>
                    <li>Tamaño del platillo: {{ $platillo->tam_platillo }} </li>
                    <li>Precio del platillo: {{ $platillo->precio_platillo }} </li>
                    <li>Descripción del platillo: {{ $platillo->info_platillo }} </li>
                
                </ul>
                <hr>
                <h4>Acciones sobre registro</h4>
                <hr>
                
                @if($platillo->imagen == false)
                    <h4 class="text-center">Agregar imagen</h4>
                    <form action="/guardarArchivo/{{ $platillo->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" required type="file" name="archivo">
                                <label class="custom-file-label" for="archivo">Elegir archivo...</label>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit" value="Guardar imagen">
                        </div>
                    </form>
                    <hr>
                    <a class="btn btn-secondary" href="/platillo">
                        Volver    
                    </a> 
                @else
                <h4 class="text-center">Imagen de referencia</h4>
                    @foreach($platillo->archivos as $foto)
                    <img src="{{ \Storage::url($foto->ubicacion) }}" alt="Responsive image" class="img-fluid">
                    @endforeach
                    <hr>
                    
                    <h4 class="text-center">Seleccionar una nueva imagen</h3>
                    <form action="/editarArchivo/{{ $platillo->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" required type="file" name="nuevoArchivo">
                                <label class="custom-file-label" for="nuevoArchivo">Elegir archivo...</label>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit" value="Guardar imagen">
                        </div>
                    </form>
                    
                    <hr>
                    <div class="container text-center">
                        <a href="">
                            <form action="/eliminarArchivo/{{ $platillo->id }}" method="POST">
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Eliminar imagen">
                            </form>
                        </a>
                    </div>
                    <hr>
                        <a class="btn btn-secondary" href="/platillo">
                            Volver    
                        </a>
                @endif
            </div>
        </div>
    </div>


</x-main-template>