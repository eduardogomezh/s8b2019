<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $todos = Carro::all();
        return view('carro.listado', compact('todos'));
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
        return view ("carro.nuevo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = new Carro();
        $registro->fill($request->all());
        $registro->save();
        return redirect("/Carro")->with('ok','Se dio de alta un carro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registro = Carro::find($id);
        return view('carro.mostrar',compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Carro::find($id);
        return view('carro.editar',compact('registro'));
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
        $registro = Carro::find($id);
        $registro->fill($request->all());
        $registro->save();
        return redirect("/Carro")->with('ok','Se actualizo el carro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Carro::find($id);
        $registro->delete();
        return redirect("/Carro")->with('ok','Se borro el carro');
        //
    }
}
