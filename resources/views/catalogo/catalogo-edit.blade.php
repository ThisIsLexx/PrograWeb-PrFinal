<x-main-template titulo="Editar datos">
    
    <h1>EDITAR DATOS</h1>
    <form action="/catalogo/{{ $catalogo->id }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="tipo">Tipo de platillo</label>
        <select name="tipo" id="tipo" required>
            <option value="opcion" selected disabled>Seleccione una opción</option>
            <option value="camarones" {{ $catalogo->tipo == 'camarones' ? 'selected' : '' }}>Platillo de camarón</option>
            <option value="filetes" {{ $catalogo->tipo == 'filetes' ? 'selected' : '' }}>Platillo de filete</option>
            <option value="cocteles" {{ $catalogo->tipo == 'cocteles' ? 'selected' : '' }}>Cocteles</option>
        </select><br>

        <label for="tam">Tamaño del platillo</label>
        <select name="tam" id="tam" required>
            <option value="" selected disabled>Seleccione una opción</option>
            <option value="chico" {{ $catalogo->tam == 'chico' ? 'selected' : '' }} >Chico</option>
            <option value="mediano" {{ $catalogo->tam == 'mediano' ? 'selected' : '' }}>Mediano</option>
            <option value="grande" {{ $catalogo->tam == 'grande' ? 'selected' : '' }}>Grande</option>
        </select><br>

        <label for="precio">Precio del platillo</label>
        <input type="number" name="precio" id="precio" required value="{{$catalogo->precio}}"><br>

        <input type="submit" value="Editar registro">
        <a href="/catalogo">Salir</a>
    </form>
</x-main-template>