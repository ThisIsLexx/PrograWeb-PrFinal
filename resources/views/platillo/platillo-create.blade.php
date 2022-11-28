<x-main-template titulo="Crear platillo">

<div>
    <form action="/platillo" method="POST">
        @csrf
    
        <label for="nombre_platillo">Nombre del platillo</label>
        <input required type="text" name="nombre_platillo" id="nombre_platillo" placeholder="Camarones empanizados..."><br>
        @error('nombre_platillo')
            <p>{{ $message }}</p>
        @enderror
        
        <label for="tipo_platillo">Tipo de platillo</label>
        <select required name="tipo_platillo" id="tipo_platillo">
            <option value="" selected disabled>Seleccione una opción</option>
            <option value="camarones">Camarón</option>
            <option value="cocteles">Coctel</option>
            <option value="filetes">Filete</option>
        </select><br>
        @error('tipo_platillo')
            <p>{{ $message }}</p>
        @enderror

        <label for="tam_platillo">Tamaño del platillo</label>
        <select required name="tam_platillo" id="tam_platillo">
            <option value="" selected disabled>Seleccione un tamaño</option>
            <option value="chico">Chico</option>
            <option value="mediano">Mediano</option>
            <option value="grande">Grande</option>
        </select><br>
        @error('tam_platillo')
            <p>{{ $message }}</p>
        @enderror

        <label for="precio_platillo">Precio del platillo</label>
        <input required type="number" name="precio_platillo" id= "precio_platillo"><br>
        @error('precio_platillo')
            <p>{{ $message }}</p>
        @enderror

        <label for="info_platillo">Descripción del platillo</label><br>
        <textarea required name="info_platillo" id="info_platillo" cols="30" rows="10" placeholder="Es un platillo preparado con..."></textarea><br>
        @error('info_platillo')
            <p>{{ $message }}</p>
        @enderror
        <input type="submit" value="Crear platillo">
    </form>
</div>

</x-main-template>