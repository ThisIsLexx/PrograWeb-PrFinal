<?php

namespace App\Http\Controllers;

use App\Models\Platillo;
use App\Models\Catalogo;
use App\Models\Archivo;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Gate;

class PlatilloController extends Controller
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
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }
        return view('platillo.platillo-create');
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
        
        return redirect("/platillo")->with('success','Platillo agregado correctamente!');

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
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }
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
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }
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
        return redirect("/platillo")->with('success','Datos del platillo editados correctamente!');
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

    public function menu(Platillo $platillo){

        $platillos = Platillo::with('archivos');

        return view('platillo.platillo-menu', compact('platillos'));
    }

    public function guardarArchivo(Request $request, $platillo_id){

        if($request->file('archivo')->isValid()){
            $ubicacion = $request->archivo->store('public');

            $archivo = new Archivo();
            $archivo->platillo_id = $platillo_id;
            $archivo->ubicacion = $ubicacion;
            $archivo->nombre_original = $request->archivo->getClientOriginalName();
            $archivo->mime = $request->archivo->getClientMimeType();
            $archivo->save();

            $platillo = Platillo::find($platillo_id);
            $platillo->imagen = $ubicacion;
            $platillo->save();

            return redirect('platillo')->with('success','Imagen guardada correctamente!');
        }
    }

    public function editarArchivo(Request $request, $platillo_id){
        
        $platillo = Platillo::find($platillo_id);

        if($request->file('nuevoArchivo')->isValid()){
            
            Storage::delete($platillo->imagen);
            Archivo::where('platillo_id', $platillo_id)->delete();
            
            $ubicacion = $request->nuevoArchivo->store('public');

            $archivo = new Archivo();
            $archivo->platillo_id = $platillo_id;
            $archivo->ubicacion = $ubicacion;
            $archivo->nombre_original = $request->nuevoArchivo->getClientOriginalName();
            $archivo->mime = $request->nuevoArchivo->getClientMimeType();
            $archivo->save();

            $platillo->imagen = $ubicacion;
            $platillo->save();
            
            return redirect('platillo')->with('success','Imagen editada correctamente!');
        }

    }

    public function eliminarArchivo(Request $request, $platillo_id){
        
        $platillo = Platillo::find($platillo_id);

        Storage::delete($platillo->imagen);
        Archivo::where('platillo_id', $platillo_id)->delete();

        $platillo->imagen = null;
        $platillo->save();

        return redirect('platillo')->with('success','Imagen eliminada correctamente!');
    }

}
