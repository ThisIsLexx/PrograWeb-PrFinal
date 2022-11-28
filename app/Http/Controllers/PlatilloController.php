<?php

namespace App\Http\Controllers;

use App\Models\Platillo;
use App\Models\Catalogo;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;


class PlatilloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platillos = Platillo::all();

        return view('platillo.platillo-index', compact('platillos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogo = Catalogo::all();

        return view('platillo.platillo-create', compact('catalogo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_platillo' => 'required|max:255|min:3',
            'tipo_platillo' => 'required|in:camarones,cocteles,filetes|not_in:0',
            'tam_platillo' => 'required|in:chico,mediano,grande|not_in:0',
            'precio_platillo' => 'required|numeric|min:1',
            'info_platillo' => 'required|max:255|min:3',
        ]);
        
        $request->merge(['user_id' => Auth::id()]);
        Platillo::create($request->all());
        
        return redirect("/platillo");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Platillo  $platillo
     * @return \Illuminate\Http\Response
     */
    public function show(Platillo $platillo)
    {
        //
        return view('platillo.platillo-show', compact('platillo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Platillo  $platillo
     * @return \Illuminate\Http\Response
     */
    public function edit(Platillo $platillo)
    {
        //
        return view("platillo.platillo-edit", compact('platillo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Platillo  $platillo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Platillo $platillo)
    {
        //
        $request->validate([
            'nombre_platillo' => 'required|max:255|min:3',
            'tipo_platillo' => 'required|in:camarones,cocteles,filetes',
            'tam_platillo' => 'required|in:chico,mediano,grande|not_in:0',
            'precio_platillo' => 'required|numeric|min:1',
            'info_platillo' => 'required|max:255|min:3',

        ]);

        $platillo->nombre_platillo = $request->nombre_platillo;
        $platillo->tipo_platillo = $request->tipo_platillo;
        $platillo->tam_platillo = $request->tam_platillo;
        $platillo->precio_platillo = $request->precio_platillo;
        $platillo->info_platillo = $request->info_platillo;

        $platillo->save();
        return redirect("/platillo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Platillo  $platillo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Platillo $platillo)
    {
        //
        $platillo->destroy($platillo->id);
        return redirect('platillo')->with('success', 'Platillo eliminado correctamente!');
    }
}