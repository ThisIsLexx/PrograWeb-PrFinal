<x-main-template titulo="Editar pedido">
    <div class="container">
        <br><br>
        <h4>Editar datos del pedido: {{ $order->nombre_orden }}</h4>
        <hr>
        <div class="container-fluid">
            <h5>La información editada se verá reflejada en el pedido</h5>
        </div>
        <hr>
        <form action="/order/{{ $order->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="fecha_orden">Fecha del pedido</label><br>
                <input class="form-control" required type="date" name="fecha_orden" id="fecha_orden" value="{{ $order->fecha_orden }}"><br>
                @error('fecha_orden')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
            
                <label for="nombre_orden">Nombre de la orden:</label><br>
                <input class="form-control" required type="text" name="nombre_orden" id="nombre_orden" value="{{ $order->nombre_orden }}"><br>
                @error('nombre_orden')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
            
                <label for="direccion_orden">Dirección de envio:</label><br>
                <input class="form-control" required type="text" name="direccion_orden" id="direccion_orden" value="{{ $order->direccion_orden }}"><br>
                @error('direccion_orden')
                    <div class="alert-danger">{{ $message }}</div>  
                @enderror
            
                <label for="codigoP_orden">Codigo Postal (5 digitos):</label><br>
                <input class="form-control" required type="text" name="codigoP_orden" id="codigoP_orden" value="{{ $order->codigoP_orden }}"><br>
                @error('codigoP_orden')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
            
            
                <h3>Seleccionar productos:</h3>
                
                @if(!empty($platillos))
                    <select class="form-control" required name="platillos_id[]" multiple>
                        @foreach($platillos as $platillo)
                            <option value="{{ $platillo->id }}">{{ $platillo->nombre_platillo}}</option>
                        @endforeach 
                    </select><br>
                @endif
                @error('platillos_id')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
            
                <label for="comentario_orden"></label>
                <textarea class="form-control" required name="comentario_orden" cols="30" rows="10" placeholder="Agregar bebidas, sin jitomate...">{{ $order->comentario_orden }}</textarea><br><br>
                @error('comentario_orden')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" value="Guardar datos">
                </div>
            </div>
        </form>
        <a class="btn btn-secondary" href="/order">Salir</a>
    </div>

</x-main-template>