<x-main-template titulo="titulo">

<h2>REALIZAR ORDEN</h2>

<form action="/order" method="POST">
    @csrf

    <label for="fecha_orden">Fecha del pedido</label><br>
    <input required type="date" name="fecha_orden" id="fecha_orden"><br>
    @error('fecha_orden')
        <p>{{ $message }}</p>
    @enderror

    <label for="nombre_orden">Nombre de la orden:</label><br>
    <input required type="text" name="nombre_orden" id="nombre_orden">

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
    <textarea required name="comentario_orden" cols="30" rows="10" placeholder="Agregar bebidas, sin jitomate..."></textarea><br><br>
    @error('comentario_orden')
        <p>{{ $message }}</p>
    @enderror

    <input type="submit" value="Realizar pedido">
    
</form>





</x-main-template>