<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Registro;
use App\Foto;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Registro::all(),201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viewReg.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kilometros=$request->input('kilometros');
        $gasolina=$request->input('gasolina');
        $kilos=$request->input('kilos');
        $login_id=$request->input('login_id');

        if(!$kilometros || !$gasolina || !$kilos || !$login_id){
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos'])],422);
        }
        else{
            $registro=Registro::create($request->all());
            return response()->json(['status'=>'ok','data'=>$registro],201);
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
        $registro=Registro::find($id);
        if(!$registro){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra'])],404);
        }
        else{
            return response()->json(['status'=>'ok','data'=>$registro],200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro=Registro::find($id);
        if(!$registro){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra'])],404);
        }
        else{
            $registro->delete();
            return response()->json(['status'=>'ok','data'=>$registro,'message'=>'se elimino el registro'],204);
        }
    }
}
