<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Login;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Login::all(),201);
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
        $alias=$request->input('alias');
        $pass=$request->input('pass');

        if(!$alias || !$pass){
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos'])],422);
        }
        else{
            $login=Login::create($request->all());
            return response()->json(['status'=>'ok','data'=>$login],201);
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
        $login=Login::find($id);
        if(!$login){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra'])],404);
        }
        else{
            return response()->json(['status'=>'ok','data'=>$login],200);
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
        $login=Login::find($id);
        if(!$login){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra'])],404);
        }
        else{
            $login->delete();
            return response()->json(['status'=>'ok','data'=>$login,'message'=>'se elimino el registro'],204);
        }
    }
}
