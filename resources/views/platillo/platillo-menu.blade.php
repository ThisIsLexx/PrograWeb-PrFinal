<x-main-template titulo="Menu - Mariscos Cheos">
    <div class="fondo">
        <br>
        <h2 class="text-center text-light">Menu - Mariscos Cheo's</h2>
        <div class="container">
            <br>
            <div class="row">
                @foreach($platillos as $platillo)
                        @if($platillo->imagen == null)
                            <div class="card w-50">
                                <img class="card-img-top" src="{{asset('assets/img/example_img.jpg')}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $platillo->nombre_platillo }}</h5>
                                    <p class="card-text">{{ $platillo->info_platillo }}</p>
                                    <hr>
                                    <p class="card-text">Precio: ${{ $platillo->precio_platillo }}.00</p>
                                </div>
                            </div>
                        @else
                            <div class="card w-50">
                                <img class="card-img-top" src="{{ \Storage::url($platillo->imagen) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $platillo->nombre_platillo }}</h5>
                                    <p class="card-text">{{ $platillo->info_platillo }}</p>
                                    <hr>
                                    <p class="card-text">Precio: ${{ $platillo->precio_platillo }}.00</p>
                                </div>
                            </div>
                        @endif
                @endforeach
            </div>
        </div>
        <br>
        <x-Footer/>
    </div>


</x-main-template>