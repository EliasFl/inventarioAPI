<?php

namespace App\Http\Controllers;

use App\AsientoContable;
use Illuminate\Http\Request;

class AsientoContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AsientoContable::get(), 200);
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
        $newAsientoContable = new AsientoContable;
        $newAsientoContable->descripcion = $request->descripcion;
        $newAsientoContable->tipo_inventario = $request->tipo_inventario;
        $newAsientoContable->cuenta_contable = $request->cuenta_contable;
        $newAsientoContable->tipo_movimiento = $request->tipo_movimiento;
        $newAsientoContable->monto = $request->monto;
        $newAsientoContable->estado = $request->estado;

        $newAsientoContable->save();

        return response()->json($newAsientoContable, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AsientoContable  $asientoContable
     * @return \Illuminate\Http\Response
     */
    public function show($asientoContable)
    {
        $asientoContableInfo = AsientoContable::find($asientoContable);
        if(is_null($asientoContableInfo)){
            return response()->json(null, 404);
        }
        return response()->json($asientoContableInfo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsientoContable  $asientoContable
     * @return \Illuminate\Http\Response
     */
    public function edit(AsientoContable $asientoContable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsientoContable  $asientoContable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $asientoContable)
    {
        $asientoContableInfo = AsientoContable::find($asientoContable);
        $asientoContableInfo->update($request->all());
        return response()->json($asientoContableInfo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsientoContable  $asientoContable
     * @return \Illuminate\Http\Response
     */
    public function destroy($asientoContable)
    {
        AsientoContable::destroy($asientoContable);
        return response()->json(null, 204);
    }
}
