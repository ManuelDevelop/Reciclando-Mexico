<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Registro;
use Laracasts\Flash\Flash;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros=Registro::orderBy('id','ASC')->paginate(10);
        return view('viewReg.mostrar')->with('listreg',$registros);
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
        //$login_id=$request->input('login_id');
        $login_id=1;
        if(!$kilometros || !$gasolina || !$kilos || !$login_id){
            dd("Faltan Datos");
        }
        else{
            $registro=new Registro($request->all());
            $registro->login_id=1;
            $registro->save();
            Flash::success("se creo el nuevo registro");
            return redirect()->route('reg.index');
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
