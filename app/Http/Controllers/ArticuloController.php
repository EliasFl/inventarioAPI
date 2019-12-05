<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Articulo::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newArticulo = new Articulo;
        $newArticulo->almacen_id = $request->almacen_id;
        $newArticulo->descripcion = $request->descripcion;
        $newArticulo->existencia = $request->existencia;
        $newArticulo->tipo_inventario = $request->tipo_inventario;
        $newArticulo->costo = $request->costo;
        $newArticulo->estado = $request->estado;

        $newArticulo->save();

        return response()->json($newArticulo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show($articulo)
    {
        $articuloInfo = Articulo::find($articulo);
        if(is_null($articuloInfo)){
            return response()->json(null, 404);
        }
        return response()->json($articuloInfo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $articulo)
    {
        $articuloInfo = Articulo::find($articulo);
        $articuloInfo->update($request->all());
        return response()->json($articuloInfo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($articulo)
    {
        Articulo::destroy($articulo);
        return response()->json(null, 204);
    }
}
