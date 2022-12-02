<x-main-template titulo="Editar datos">
    <div class="container">
        <br><br>
        <h2 class="text-center">Editar datos de {{ $catalogo->tipo }}: {{ $catalogo->tam }}</h2>
        <hr>
        <div class="container-fluid">
            <h5>Estos cambios se verán reflejados en el catalogo de precios</h5>
        </div>
        <hr>
        <form action="/catalogo/{{ $catalogo->id }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="tipo">Tipo de platillo</label>
                <select class="form-control" name="tipo" id="tipo" required>
                    <option value="opcion" selected disabled>Seleccione una opción</option>
                    <option value="camarones" {{ $catalogo->tipo == 'camarones' ? 'selected' : '' }}>Platillo de camarón</option>
                    <option value="filetes" {{ $catalogo->tipo == 'filetes' ? 'selected' : '' }}>Platillo de filete</option>
                    <option value="cocteles" {{ $catalogo->tipo == 'cocteles' ? 'selected' : '' }}>Cocteles</option>
                </select><br>
        
                <label for="tam">Tamaño del platillo</label>
                <select class="form-control" name="tam" id="tam" required>
                    <option value="" selected disabled>Seleccione una opción</option>
                    <option value="chico" {{ $catalogo->tam == 'chico' ? 'selected' : '' }} >Chico</option>
                    <option value="mediano" {{ $catalogo->tam == 'mediano' ? 'selected' : '' }}>Mediano</option>
                    <option value="grande" {{ $catalogo->tam == 'grande' ? 'selected' : '' }}>Grande</option>
                </select><br>
        
                <label for="precio">Precio del platillo</label>
                <input class="form-control" type="number" name="precio" id="precio" required value="{{$catalogo->precio}}"><br>
                @error('precio')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
                <hr>
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" value="Editar registro">
                    <a class="btn btn-secondary" href="/catalogo">Salir</a>
                </div>
            </div>
    
        </form>
    </div>    
</x-main-template>