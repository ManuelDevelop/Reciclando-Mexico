<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Registro;
use App\Foto;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $registros=Registro::where("login_id","=",$id)->orderBy('id','DSC')->paginate(10);
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
        $file=$request->file('image');


        if(!$kilometros || !$gasolina || !$kilos || !$request->hasFile('image')){
            Flash::warning('Faltan Datos');
            return redirect()->route('reg.create');
        }
        else{
            $registro=new Registro($request->all());
            $registro->login_id=Auth::user()->id;
            $registro->save();
            $id=Auth::user()->id;
            $reg=Registro::where("login_id","=",$id)->orderBy('id','DSC')->paginate(1);
            $r=$reg[0];
            $image=$file->store('IMG','public');
            $foto=new Foto();
            $foto->picture=$image;
            $foto->registro_id=$r->id;
            $foto->save();
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
        $reg=Registro::find($id);
        if(!$reg){
            Flash::warning("Ese registro no existe");
        }
        else{
            return view('viewReg.editar')->with('reg',$reg);
        }
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
        $reg=Registro::find($id);
        if(!$reg){
            Flash::warning("Ese registro no existe");
        }
        else{
            if($request->hasFile('image')){
                Flash::success("Actualizacion del registro Exitosa");
                $foto=$reg->foto;
                Storage::disk('public')->delete($foto->picture);
                $foto->delete();

                $reg->fill($request->all());
                $reg->save();

                $file=$request->file('image');
                $image=$file->store('IMG','public');
                $foto=new Foto();
                $foto->picture=$image;
                $foto->registro_id=$reg->id;
                $foto->save();
                return redirect()->route('reg.index');
            }
            else{
                Flash::success("Actualizacion del registro Exitosa");
                $reg->fill($request->all());
                $reg->save();
                return redirect()->route('reg.index');
            }
        }
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
            Flash::warning("Ese registro no existe");
        }
        else{
            Storage::disk('public')->delete($registro->foto->picture);
            $foto=$registro->foto;
            $foto->delete();
            $registro->delete();
            Flash::success('El registro se elimino de Manera Exitosa');
            return redirect()->route('reg.index');
        }
    }
}
