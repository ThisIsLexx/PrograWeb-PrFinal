<x-main-template titulo="Crear producto">
    <h1>Aqui se creara el form</h1>

    <form action="/catalogo" method="POST">
    @csrf
        <label for="tipo">Tipo de platillo</label>
        <select name="tipo" id="tipo" required>
            <option value="opcion" selected disabled>Seleccione una opción</option>
            <option value="camarones">Platillo de camarón {{ $tipo = 'camarones' }}</option>
            <option value="filetes">Platillo de filete</option>
            <option value="cocteles">Cocteles</option>
        </select><br>
        @error('tipo')
            <p> {{ $message }}</p>
        @enderror

        <label for="tam">Tamaño del platillo</label>
        <select name="tam" id="tam" required>
            <option value="" selected disabled>Seleccione una opción</option>
            <option value="chico">Chico</option>
            <option value="mediano">Mediano</option>
            <option value="grande">Grande</option>
        </select><br>

        <label for="precio">Precio del platillo</label>
        <input type="number" name="precio" id="precio" required><br>

        <input type="submit" value="Registrar en catalogo">
    </form>
</x-main-template>