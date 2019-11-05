<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propietario;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $todos = Propietario::all();
        return view('Propietario.listado', compact('todos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ("Propietario.nuevo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = new Propietario();
        $registro->fill($request->all());
        $registro->save();
        return redirect("/Propietario")->with('ok','Se dio de alta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registro = Propietario::find($id);
        return view('Propietario.mostrar',compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Propietario::find($id);
        return view('Propietario.editar',compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $registro = Propietario::find($id);
        $registro->fill($request->all());
        $registro->save();
        return redirect("/Propietario")->with('ok','Se actualizo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Propietario::find($id);
        try{
            $registro->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return redirect("/Propietario")->with('ok','Error, no puedes eliminar');
        }
        return redirect("/Propietario")->with('ok','Se borro');
        //
    }
}
