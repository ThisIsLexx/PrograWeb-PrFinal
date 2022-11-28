<x-main-template titulo="Editar platillo">

    <form action="/platillo/{{ $platillo->id }}" method="POST">
        @csrf
        @method('PATCH')
    
        <label for="nombre_platillo">Nombre del platillo</label>
        <input required type="text" name="nombre_platillo" id="nombre_platillo" placeholder="Camarones empanizados..." value="{{ $platillo->nombre_platillo }}"><br>
        @error('nombre_platillo')
            <p>{{ $message }}</p>
        @enderror
        
        <label for="tipo_platillo">Tipo de platillo</label>
        <select required name="tipo_platillo" id="tipo_platillo">
            <option value="" selected disabled>Seleccione una opción</option>
            <option value="camarones" {{ $platillo->tipo_platillo == "camarones" ? 'selected' : '' }}>Camarón</option>
            <option value="cocteles" {{ $platillo->tipo_platillo == "cocteles" ? 'selected' : '' }}>Coctel</option>
            <option value="filetes" {{ $platillo->tipo_platillo == "filetes" ? 'selected' : '' }}>Filete</option>
        </select><br>
        @error('tipo_platillo')
            <p>{{ $message }}</p>
        @enderror

        <label for="tam_platillo">Tamaño del platillo</label>
        <select required name="tam_platillo" id="tam_platillo">
            <option value="" selected disabled>Seleccione un tamaño</option>
            <option value="chico" {{ $platillo->tam_platillo == "chico" ? 'selected' : '' }} >Chico</option>
            <option value="mediano" {{ $platillo->tam_platillo == "mediano" ? 'selected' : '' }} >Mediano</option>
            <option value="grande" {{ $platillo->tam_platillo == "grande" ? 'selected' : '' }} >Grande</option>
        </select><br>
        @error('tam_platillo')
            <p>{{ $message }}</p>
        @enderror

        <label for="precio_platillo">Precio del platillo</label>
        <input required type="number" name="precio_platillo" id= "precio_platillo" value="{{ $platillo->precio_platillo }}"><br>
        @error('precio_platillo')
            <p>{{ $message }}</p>
        @enderror

        <label for="info_platillo">Descripción del platillo</label><br>
        <textarea required name="info_platillo" id="info_platillo" cols="30" rows="10" placeholder="Es un platillo preparado con...">{{ $platillo->info_platillo }}</textarea><br>
        @error('info_platillo')
            <p>{{ $message }}</p>
        @enderror
        <input type="submit" value="Guardar cambios"><br>
        <a href="/platillo">salir</a>
    </form>

</x-main-template>