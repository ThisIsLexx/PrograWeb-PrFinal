<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Platillo;
use illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }

        $orders = Order::all();
        return view('order.order-index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $platillos = Platillo::all();
        return view('order.order-create', compact('platillos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_orden' => 'required|min:3|max:255',
            'fecha_orden' => 'required|date|after_or_equal:today',
            'direccion_orden' => 'required|min:3|max:255',
            'codigoP_orden' => 'required|min:5|max:5',
            'comentario_orden' => 'required|max:255|min:3',
        ]);

        $request->merge(['user_id' => Auth::id()]);
        $request->merge(['cantidad_orden' => sizeof($request->platillos_id)]);
        $request->merge(['total_orden' => 0]);

        $order = Order::create($request->all());
        

        $order->platillos()->attach($request->platillos_id);

        $order->total_orden = $order->getPrecioTotal();
        $order->save();    

        return redirect('/order')->with('success','Orden creada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }

        return view('order.order-show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }

        $platillos = Platillo::all();
        return view('order.order-edit', compact('order', 'platillos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
        $request->validate([
            'nombre_orden' => 'required|min:3|max:255',
            'fecha_orden' => 'required|date|after_or_equal:today',
            'direccion_orden' => 'required|min:3|max:255',
            'codigoP_orden' => 'required|min:5|max:5',
            'comentario_orden' => 'required|max:255|min:3',
        ]);

        // $order-> = $request->;
        // $order->save();

        $request->merge(['cantidad_orden' => sizeof($request->platillos_id)]);
        $request->merge(['total_orden' => 0]);

        Order::where('id', $order->id )->update($request->except('_token', '_method','platillos_id'));

        $order->platillos()->sync($request->platillos_id);

        $order->total_orden = $order->getPrecioTotal();
        $order->save();

        return redirect('/order')->with('success', 'Datos editados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        if (! Gate::allows('gestionar-datos')){
            abort(403, 'Que haces aqui??? No eres un administrador!');
        }

        $order->destroy($order->id);
        return redirect('/order')->with('success','Orden eliminada con exito!');
    }

    public function misPedidos(){
        $orders = Order::all();

        return view('order.order-misPedidos', compact('orders'));
    }
}
