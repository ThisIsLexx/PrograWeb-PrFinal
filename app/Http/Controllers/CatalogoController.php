<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }
        // Se retornan todos los registros existentes dentro de la tabla catalogo
        $catalogo = Catalogo::all();

        return view('catalogo.catalogo-index', compact('catalogo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }
        // Se redirecciona a la vista Create de la clase catalogo
        return view('catalogo/catalogo-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Se realizan las validaciones en los campos del form enviado a través del request.
        $request->validate([
            'tipo' => 'required|in:camarones,filetes,cocteles|not_in:0',
            'tam' => 'required|in:chico,mediano,grande|not_in:0',
            'precio' => 'required|max:10|min:1|gt:0',
        ]);

        // Se llama al metodo create del modelo Catalogo

        Catalogo::create($request->all());

        // Redireccionamos a la vista principal.

        return redirect('catalogo')->with('success','Producto agregado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogo $catalogo)
    {
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogo $catalogo)
    {
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }
        // Se retorna a la vista de edición, junto con la información contenida en el registro, para poder editar los campos del formulario.
        return view('catalogo.catalogo-edit', compact('catalogo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogo $catalogo)
    {
        $request->validate([
            'tipo' => 'required|in:camarones,filetes,cocteles|not_in:0',
            'tam' => 'required|in:chico,mediano,grande|not_in:0',
            'precio' => 'required|max:10|min:1|gt:0',
        ]);

        // Se toma el request enviado desde la vista catalogo-Edit para procesarlo dentro de la BD.
        $catalogo->tipo = $request->tipo;
        $catalogo->tam = $request->tam;
        $catalogo->precio = $request->precio;
        $catalogo->save();

        // redireccionamos a la vista principal.
        return redirect('catalogo')->with('success','Producto editado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalogo $catalogo)
    {
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }
        // Recibimos por medio de un formulario con metodo POST y DELETE, un objeto de la clase catalogo para ser eliminado.
        $catalogo->destroy($catalogo->id);
        // Redireccionamos a la vista principal.
        return redirect('catalogo')->with('success','Producto eliminado con exito!');
    }
}
