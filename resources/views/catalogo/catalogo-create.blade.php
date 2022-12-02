<x-main-template titulo="Crear producto">
    <div class="container">
        <br><br>
        <h2 class="text-center">Agregar nuevo producto</h2>
        <hr>
        <div class="container-fluid">
            <h5>Este será tomado como referencia al agregar platillos</h5>
        </div>
        <hr>
        <form action="/catalogo" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipo">Tipo de platillo</label>
                <select class="form-control" name="tipo" id="tipo" required>
                    <option value="opcion" selected disabled>Seleccione una opción</option>
                    <option value="camarones" {{ old('tipo') == 'camarones' ? 'selected' : "" }}>Platillo de camarón</option>
                    <option value="filetes" {{ old('tipo') == 'filetes' ? 'selected' : "" }}>Platillo de filete</option>
                    <option value="cocteles" {{ old('tipo') == 'cocteles' ? 'selected' : "" }}>Cocteles</option>
                </select><br>
        
                <label for="tam">Tamaño del platillo</label>
                <select class="form-control" name="tam" id="tam" required>
                    <option value="" selected disabled>Seleccione una opción</option>
                    <option value="chico" {{ old('tam') == 'chico' ? 'selected' : "" }}>Chico</option>
                    <option value="mediano" {{ old('tam') == 'mediano' ? 'selected' : "" }}>Mediano</option>
                    <option value="grande" {{ old('tam') == 'grande' ? 'selected' : "" }}>Grande</option>
                </select><br>
        
                <label for="precio">Precio del platillo</label>
                <input class="form-control" type="number" name="precio" id="precio" required><br>
                @error('precio')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
                <hr>
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" value="Registrar en catalogo">
                    <a class="btn btn-secondary" href="/catalogo">Salir</a>
                </div>
            </div>
        </form>
    </div>    
</x-main-template>