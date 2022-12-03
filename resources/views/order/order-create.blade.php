<x-main-template titulo="Hacer pedido - Mariscos Cheo's">
    <div class="container">
        <br><br>
        <h2 class="text-center">Realizar un pedido</h2>
        <hr>
        <div class="container-fluid">
            <h5>Porfavor seleccionar todos los campos</h5>
        </div>
        <hr>
        <form action="/order" method="POST">
            @csrf
        
            <label for="fecha_orden">Fecha del pedido</label><br>
            <input class="form-control" required type="date" name="fecha_orden" id="fecha_orden" value="{{ old('fecha_orden') }}"><br>
            @error('fecha_orden')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
        
            <label for="nombre_orden">Nombre de la orden:</label><br>
            <input class="form-control" required type="text" name="nombre_orden" id="nombre_orden" value="{{ old('nombre_orden') }}"><br>
            @error('nombre_orden')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
        
            <label for="direccion_orden">Dirección de envio:</label><br>
            <input class="form-control" required type="text" name="direccion_orden" id="direccion_orden" value="{{ old('direccion_orden') }}"><br>
            @error('direccion_orden')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
        
            <label for="codigoP_orden">Codigo Postal (5 digitos):</label><br>
            <input class="form-control" required type="text" name="codigoP_orden" id="codigoP_orden" value="{{ old('codigoP_orden') }}" maxlength="5"><br>
            @error('codigoP_orden')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
        
        
            <h3>Seleccionar productos:</h3>
            
            @if(!empty($platillos))
                <select class="form-control" name="platillos_id[]" multiple>
                    @foreach($platillos as $platillo)
                        <option value="{{ $platillo->id }}">{{ $platillo->nombre_platillo}}</option>
                    @endforeach 
                </select><br>
            @endif
            @error('platillos_id')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
        
            <label for="comentario_orden"></label>
            <textarea class="form-control" required name="comentario_orden" cols="30" rows="10" placeholder="Agregar bebidas, sin jitomate...">{{ old('comentario_orden') }}</textarea><br><br>
            @error('comentario_orden')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
            <div class="text-center">
                <input class="btn btn-primary"type="submit" value="Realizar pedido">
            </div>
        </form>
        @if(@Auth::user()->rol == "admin")
            <a href="/order" class="btn btn-secondary">Salir</a>
        @else
            <a href="/misPedidos" class="btn btn-secondary">Salir</a>
        @endif  
        <hr>
    </div>


</x-main-template>