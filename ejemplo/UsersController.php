<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;

use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::all();
        return view ("Users.index",compact('Users'));
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
        try{        
            $nuevo = new User();
            $nuevo->fill($request->all());
            $nuevo->rol = "Operativo";
            $nuevo->password = Hash::make($request->input('password'));
            $nuevo->save();

            return $request->expectsJson()
            ? response()->json( $nuevo->toArray(), 200)
            : "agregado" ;
        }catch(Exception $exception)
        {
            if ($exception instanceof \Illuminate\Database\QueryException) {    
                if( $request->expectsJson()){
                    return response()->json(  $exception->getMessage(), 501) ;  
                }
            }            
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
        //
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
        $registro = User::find($id);
        $registro->fill($request->all());

        if ($registro != null){
            try{        
                $registro->save();
                return response()->json(  $registro->toArray() , 200) ; 
            }catch(Exception $exception)
            {
                if ($exception instanceof \Illuminate\Database\QueryException) {    
                    if( $request->expectsJson()){
                        return response()->json(  $exception->getMessage(), 501) ;  
                    }
                }   
            }
        }else{
            return response()->json(  "Registro no encontrado.", 404) ;  
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
        $registro = User::find($id);
        if ($registro != null){
            try{        
                $registro->delete();
                return response()->json(  $registro->toArray() , 200) ; 
            }catch(Exception $exception)
            {
                if ($exception instanceof \Illuminate\Database\QueryException) {    
                    if( $request->expectsJson()){
                        return response()->json(  $exception->getMessage(), 501) ;  
                    }
                }   
            }
        }else{
            return response()->json(  "Registro no encontrado.", 404) ;  
        }
    }
}
