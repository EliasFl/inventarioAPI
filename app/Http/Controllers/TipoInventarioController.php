<?php

namespace App\Http\Controllers;

use App\TipoInventario;
use Illuminate\Http\Request;

class TipoInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TipoInventario::get(), 200);
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
        $newTipoInventario = new TipoInventario;
        $newTipoInventario->descripcion = $request->descripcion;
        $newTipoInventario->cuenta_contable = $request->cuenta_contable;
        $newTipoInventario->estado = $request->estado;
        $newTipoInventario->tipo_cuenta = $request->tipo_cuenta;

        $newTipoInventario->save();

        return response()->json($newTipoInventario, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoInventario  $tipoInventario
     * @return \Illuminate\Http\Response
     */
    public function show($tipoInventario)
    {
        $tipoInventarioInfo = TipoInventario::find($tipoInventario);
        if(is_null($tipoInventarioInfo)){
            return response()->json(null, 404);
        }
        return response()->json($tipoInventarioInfo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoInventario  $tipoInventario
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoInventario $tipoInventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoInventario  $tipoInventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipoInventario)
    {
        $tipoInventarioInfo = TipoInventario::find($tipoInventario);
        $tipoInventarioInfo->update($request->all());
        return response()->json($tipoInventarioInfo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoInventario  $tipoInventario
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipoInventario)
    {
        TipoInventario::destroy($tipoInventario);
        return response()->json(null, 204);
    }
}
