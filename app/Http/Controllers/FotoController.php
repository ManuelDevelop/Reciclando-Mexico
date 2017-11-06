<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Foto;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Foto::all(),201);
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
        $picture=$request->input('picture');
        $registro_id=$request->input('registro_id');

        if(!$picture || !$registro_id){
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos'])],422);
        }
        else{
            $foto=Foto::create($request->all());
            return response()->json(['status'=>'ok','data'=>$foto],201);
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
        $foto=Foto::find($id);
        if(!$foto){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra'])],404);
        }
        else{
            return response()->json(['status'=>'ok','data'=>$foto],200);
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
        $foto=Foto::find($id);
        if(!$foto){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra'])],404);
        }
        else{
            $foto->delete();
            return response()->json(['status'=>'ok','data'=>$foto,'message'=>'se elimino el registro'],204);
        }
    }
}
