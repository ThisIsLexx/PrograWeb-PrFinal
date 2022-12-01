<x-main-template titulo="Mostrar platillo - {{ $platillo->nombre_platillo }}">

<h2>{{ $platillo->nombre_platillo }}</h2>

<h3>Encargado del registro: {{ $platillo->user->name }}</h3>

<h2>Información del platillo</h2>

<ul>
    <li>Nombre del platillo: {{ $platillo->nombre_platillo }}</li>
    <li>Tipo de platillo: {{ $platillo->tipo_platillo }} </li>
    <li>Tamaño del platillo: {{ $platillo->tam_platillo }} </li>
    <li>Precio del platillo: {{ $platillo->precio_platillo }} </li>
    <li>Descripción del platillo: {{ $platillo->info_platillo }} </li>

</ul>

<h2>Acciones sobre registro</h2>

@if($platillo->imagen == false)
    <h3>Agregar imagenes: </h3>

    <form action="/guardarArchivo/{{ $platillo->id }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="archivo"><br>

        <input type="submit" value="Guardar imagen">
    </form>
@else
<h3>Imagen de referencia</h3>
    @foreach($platillo->archivos as $foto)
    <img src="{{ \Storage::url($foto->ubicacion) }}" alt="" width="500">
    @endforeach
    
    <h3>Seleccionar nueva imagen</h3>
    <form action="/editarArchivo/{{ $platillo->id }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="nuevoArchivo"><br>
        <input type="submit" value="Guardar nueva imagen">

    </form>

    <h3>Eliminar Imagen</h3>
    <a href="">
        <form action="/eliminarArchivo/{{ $platillo->id }}" method="POST">
            @csrf
            <input type="submit" value="Eliminar imagen">
        </form>
    </a>

@endif
    
    <a href="/platillo">
        <input type="submit" value="Volver">    
    </a>


</x-main-template>