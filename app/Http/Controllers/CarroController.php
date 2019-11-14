<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Carro;
use App\Propietario;
use Exception;
use Illuminate\Support\Facades\Auth;
use Tests\Feature\ExampleTest;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("listar", Carro::class);
//        $todos = Carro::all();
        $todos = Carro::where('Modelo',">",2000)->get();
        //$todos = DB::table('carros')->get();
//        $todos = DB::table('carros')->where('Modelo',">",2000)->get();

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
/*
        if (Auth::user()->origen == "Web") return "";
        if (Auth::user()->origen == "Sistema") return "";
        if (Auth::user()->origen == "Gerente") return "";
*/
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
        DB::beginTransaction();
        try{
            $registro = new Carro();
            $registro->fill($request->all());
            $registro->save();
    
            $pro = new Propietario();
            $pro->nombre = "Propietario para el carro " . $registro->Marca;
            $pro->save();
            DB::commit();
            return redirect("/Carro")->with('ok','Se dio de alta un carro');
        }catch(Exception $e){
            DB::rollBack();
            return redirect("/Carro")->with('ok','ERROR');

        }
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
