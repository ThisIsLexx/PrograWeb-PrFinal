<x-main-template titulo="titulo">

<h2>REALIZAR ORDEN</h2>

<form action="/order" method="POST">
    @csrf

    <label for="fecha_orden">Fecha del pedido</label><br>
    <input required type="date" name="fecha_orden" id="fecha_orden" value="{{ old('fecha_orden') }}"><br>
    @error('fecha_orden')
        <p>{{ $message }}</p>
    @enderror

    <label for="nombre_orden">Nombre de la orden:</label><br>
    <input required type="text" name="nombre_orden" id="nombre_orden" value="{{ old('nombre_orden') }}"><br>
    @error('nombre_orden')
        <p>{{ $message }}</p>
    @enderror

    <label for="direccion_orden">Dirección de envio:</label><br>
    <input required type="text" name="direccion_orden" id="direccion_orden" value="{{ old('direccion_orden') }}"><br>
    @error('direccion_orden')
        <p>{{ $message }}</p>
    @enderror

    <label for="codigoP_orden">Codigo Postal (5 digitos):</label><br>
    <input required type="text" name="codigoP_orden" id="codigoP_orden" value="{{ old('codigoP_orden') }}"><br>
    @error('codigoP_orden')
        <p>{{ $message }}</p>
    @enderror


    <h3>Seleccionar productos:</h3>
    
    @if(!empty($platillos))
        <select name="platillos_id[]" multiple>
            @foreach($platillos as $platillo)
                <option value="{{ $platillo->id }}">{{ $platillo->nombre_platillo}}</option>
            @endforeach 
        </select><br>
    @endif
    @error('platillos_id')
        <p>{{ $message }}</p>
    @enderror

    <label for="comentario_orden"></label>
    <textarea required name="comentario_orden" cols="30" rows="10" placeholder="Agregar bebidas, sin jitomate...">{{ old('comentario_orden') }}</textarea><br><br>
    @error('comentario_orden')
        <p>{{ $message }}</p>
    @enderror

    <input type="submit" value="Realizar pedido">
    
</form>

</x-main-template>