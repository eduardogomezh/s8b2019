<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Ajax.index");
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->expectsJson()){
            return response()->json(["quien"=> $request->input("Nombre") ],200);
        }else{
            return "estoy en show";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        if ($request->expectsJson()){
            return response()->json(["atributo"=>"valor"],200);
        }else{
            return "estoy en show";
        }
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        if ($request->expectsJson()){
            return response()->json(["atributo"=> "ACTUALIZAR EL " . $id . "con -> " . $request->input("Nombre") ],200);
        }else{
            return "estoy en destroy";
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        if ($request->expectsJson()){
            return response()->json(["atributo"=> "BORRAR EL " . $id ],200);
        }else{
            return "estoy en destroy";
        }


    }
}
