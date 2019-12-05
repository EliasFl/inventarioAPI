<?php

namespace App\Http\Controllers;

use App\TipoTransaccion;
use Illuminate\Http\Request;

class TipoTransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TipoTransaccion::get(), 200);
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
        $newTipoTransaccion = new TipoTransaccion;
        $newTipoTransaccion->descripcion = $request->descripcion;
        $newTipoTransaccion->tipo = $request->tipo;
        $newTipoTransaccion->efecto = $request->efecto;

        $newTipoTransaccion->save();

        return response()->json($newTipoTransaccion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoTransaccion  $tipoTransaccion
     * @return \Illuminate\Http\Response
     */
    public function show($tipoTransaccion)
    {
        $tipoTransaccionInfo = TipoTransaccion::find($tipoTransaccion);
        if(is_null($tipoTransaccionInfo)){
            return response()->json(null, 404);
        }
        return response()->json($tipoTransaccionInfo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoTransaccion  $tipoTransaccion
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoTransaccion $tipoTransaccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoTransaccion  $tipoTransaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tipoTransaccion)
    {
        $tipoTransaccionInfo = TipoTransaccion::find($tipoTransaccion);
        $tipoTransaccionInfo->update($request->all());
        return response()->json($tipoTransaccionInfo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoTransaccion  $tipoTransaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoTransaccion $tipoTransaccion)
    {
        TipoTransaccion::destroy($tipoTransaccion);
        return response()->json(null, 204);
    }
}
