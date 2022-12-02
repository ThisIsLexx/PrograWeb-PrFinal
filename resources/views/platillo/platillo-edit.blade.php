<x-main-template titulo="Editar platillo">
    <div class="container">
        <br><br>
        <h2 class="text-center">Editar datos: {{ $platillo->nombre_platillo }}</h2>
        <hr>
        <div class="container-fluid">
            <h5>Los datos se veran reflejados en la tabla de platillos y en el menu</h5>
        </div>
        <hr>

        <form action="/platillo/{{ $platillo->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nombre_platillo">Nombre del platillo</label>
                <input class="form-control" required type="text" name="nombre_platillo" id="nombre_platillo" placeholder="Camarones empanizados..." value="{{ $platillo->nombre_platillo }}"><br>
                @error('nombre_platillo')
                    <div class="alert-warning">{{ $message }}</div>
                @enderror
                
                <label for="tipo_platillo">Tipo de platillo</label>
                <select class="form-control" required name="tipo_platillo" id="tipo_platillo">
                    <option value="" selected disabled>Seleccione una opción</option>
                    <option value="camarones" {{ $platillo->tipo_platillo == "camarones" ? 'selected' : '' }}>Camarón</option>
                    <option value="cocteles" {{ $platillo->tipo_platillo == "cocteles" ? 'selected' : '' }}>Coctel</option>
                    <option value="filetes" {{ $platillo->tipo_platillo == "filetes" ? 'selected' : '' }}>Filete</option>
                </select><br>
                @error('tipo_platillo')
                    <div class="alert-warning">{{ $message }}</div>
                @enderror
        
                <label for="tam_platillo">Tamaño del platillo</label>
                <select class="form-control" required name="tam_platillo" id="tam_platillo">
                    <option value="" selected disabled>Seleccione un tamaño</option>
                    <option value="chico" {{ $platillo->tam_platillo == "chico" ? 'selected' : '' }} >Chico</option>
                    <option value="mediano" {{ $platillo->tam_platillo == "mediano" ? 'selected' : '' }} >Mediano</option>
                    <option value="grande" {{ $platillo->tam_platillo == "grande" ? 'selected' : '' }} >Grande</option>
                </select><br>
                @error('tam_platillo')
                    <div class="alert-warning">{{ $message }}</div>
                @enderror
        
                <label for="precio_platillo">Precio del platillo</label>
                <input class="form-control" required type="number" name="precio_platillo" id= "precio_platillo" value="{{ $platillo->precio_platillo }}"><br>
                @error('precio_platillo')
                    <div class="alert-warning">{{ $message }}</div>
                @enderror
        
                <label for="info_platillo">Descripción del platillo</label><br>
                <textarea class="form-control" required name="info_platillo" id="info_platillo" cols="30" rows="10" placeholder="Es un platillo preparado con...">{{ $platillo->info_platillo }}</textarea><br>
                @error('info_platillo')
                    <div class="alert-warning">{{ $message }}</div>
                @enderror
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" value="Guardar cambios">
                    <a class="btn btn-secondary" href="/platillo">salir</a>
                </div>
            </div>
        </form>
    </div>

</x-main-template>