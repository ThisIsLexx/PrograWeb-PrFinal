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

<h3>Agregar imagenes: </h3>


<a href="/platillo">
    <input type="submit" value="Volver">    
</a>

</x-main-template>