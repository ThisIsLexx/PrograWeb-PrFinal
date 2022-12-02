<x-main-template titulo="Crear platillo">

<div class="container">
    <br><br>
    <h2 class="text-center">Crear un nuevo platillo</h2>
    <form action="/platillo" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre_platillo">Nombre del platillo</label>
            <input required class="form-control" type="text" name="nombre_platillo" id="nombre_platillo" placeholder="Camarones empanizados..." value="{{ old('nombre_platillo') }}"><br>
            @error('nombre_platillo')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
            
            <label for="tipo_platillo">Tipo de platillo</label>
            <select required  class="form-control" name="tipo_platillo" id="tipo_platillo">
                <option value="" selected disabled>Seleccione una opción</option>
                <option value="camarones" {{ old('tipo_platillo') == 'camarones' ? 'selected' : "" }}>Camarón</option>
                <option value="cocteles" {{ old('tipo_platillo') == 'cocteles' ? 'selected' : "" }}>Coctel</option>
                <option value="filetes" {{ old('tipo_platillo') == 'filetes' ? 'selected' : "" }}>Filete</option>
            </select><br>
            @error('tipo_platillo')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
    
            <label for="tam_platillo">Tamaño del platillo</label>
            <select required class="form-control" name="tam_platillo" id="tam_platillo">
                <option value="" selected disabled>Seleccione un tamaño</option>
                <option value="chico" {{ old('tam_platillo') == 'chico' ? 'selected' : "" }}>Chico</option>
                <option value="mediano" {{ old('tam_platillo') == 'mediano' ? 'selected' : "" }}>Mediano</option>
                <option value="grande" {{ old('tam_platillo') == 'grande' ? 'selected' : "" }}>Grande</option>
            </select><br>
            @error('tam_platillo')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
    
            <label for="precio_platillo">Precio del platillo</label>
            <input required class="form-control" type="number" name="precio_platillo" id= "precio_platillo" value="{{ old('precio_platillo') }}"><br>
            @error('precio_platillo')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
    
            <label for="info_platillo">Descripción del platillo</label><br>
            <textarea required class="form-control" name="info_platillo" id="info_platillo" cols="30" rows="10" placeholder="Es un platillo preparado con...">{{ old('info_platillo') }}</textarea><br>
            @error('info_platillo')
                <div class="alert-warning">{{ $message }}</div>
            @enderror
            <div class="text-center">
                <input type="submit" class="btn btn-primary mb-2" value="Crear platillo">
            </div>

        </div>
    </form>
</div>

</x-main-template>