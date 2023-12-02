<?php

namespace App\Http\Controllers;

use App\Models\productos;
use App\Models\ventas;
use Illuminate\Http\Request;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=productos::all();
        return view('Productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id, $stock)
    {

        
        $cantidadVenta = $request->input('cantidad');

        // Realizar la venta
        $venta = new ventas;
        $venta->nombre_producto =  $request->input('nombre_producto');
        $venta->cantidad = $request->input('cantidad');
        $venta->precioVenta = $request->input('precioVenta');
        $venta->precioTotal = $request->input('precioTotal');
        $venta->save();
    
        // Actualizar el stock del producto
        $producto = productos::find($id);
        $nuevoStock = $stock - $cantidadVenta;
    
        // Asegúrate de validar que el stock no sea negativo
        $nuevoStock = max(0, $nuevoStock);
    
        $producto->stock = $nuevoStock;
        $producto->update();
    
        return redirect()->back()->with('success', 'Venta realizada con éxito.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    
        $productos = new productos;
        $productos -> nombre_producto=$request ->input('nombre_producto');
        $productos -> referencia=$request      ->input('referencia');
        $productos -> precio=$request          ->input('precio');
        $productos -> peso=$request            ->input('peso');
        $productos -> categoria=$request       ->input('categoria');
        $productos -> stock=$request           ->input('stock');

        $productos -> save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(productos $productos)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,$stock)
    {
        $cantidadVenta = $request->input('cantidad');

        // Realizar la venta
        $venta = new ventas;
        $venta->nombre_producto =  $request->input('nombre_producto');
        $venta->cantidad = $request->input('cantidad');
        $venta->precioVenta = $request->input('precioVenta');
        $venta->precioTotal = $request->input('precioTotal');
        $venta->save();
    
        // Actualizar el stock del producto
        $producto = productos::find($id);
        $nuevoStock = $stock - $cantidadVenta;
    
        // Asegúrate de validar que el stock no sea negativo
        $nuevoStock = max(0, $nuevoStock);
    
        $producto->stock = $nuevoStock;
        $producto->update();
    
        return redirect() -> back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
    
    }
}
