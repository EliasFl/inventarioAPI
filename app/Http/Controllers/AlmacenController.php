<?php

namespace App\Http\Controllers;

use App\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Almacen::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newAlmacen = new Almacen;
        $newAlmacen->descripcion = $request->descripcion;
        $newAlmacen->estado = $request->estado;

        $newAlmacen->save();

        return response()->json($newAlmacen, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show($almacen)
    {
        $almacenInfo = Almacen::find($almacen);
        if(is_null($almacenInfo)){
            return response()->json(null, 404);
        }
        return response()->json($almacenInfo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit(Almacen $almacen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $almacenInfo = Almacen::find($id);
        $almacenInfo->update($request->all());
        return response()->json($almacenInfo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy($almacen)
    {
        Almacen::destroy($almacen);
        return response()->json(null, 204);
    }
}
