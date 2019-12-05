<?php

namespace App\Http\Controllers;

use App\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Transaccion::get(), 200);
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
        $newTransaccion = new Transaccion;
        $newTransaccion->tipo_transaccion = $request->tipo_transaccion;
        $newTransaccion->articulo_id = $request->articulo_id;
        $newTransaccion->cantidad = $request->cantidad;

        $newTransaccion->save();

        return response()->json($newTransaccion, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function show($transaccion)
    {
        $transaccionInfo = Transaccion::find($transaccion);
        if(is_null($transaccionInfo)){
            return response()->json(null, 404);
        }
        return response()->json($transaccionInfo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaccion $transaccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $transaccion)
    {
        $transaccionInfo = Transaccion::find($transaccion);
        $transaccionInfo->update($request->all());
        return response()->json($transaccionInfo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaccion  $transaccionS
     * @return \Illuminate\Http\Response
     */
    public function destroy($transaccion)
    {
        Transaccion::destroy($transaccion);
        return response()->json(null, 204);
    }
}
