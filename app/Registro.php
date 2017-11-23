<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    //nombre de la base de datos como aparece en sqlite
    protected $table='Registros';
    //elementos de la base da datos
    protected $fillable=array('kilometros','gasolina','kilos','login_id');
    //elementos que no se devuelven
    protected $hidden=['created_at','updated_at'];

    //metodo inverso de one to one
    public function user(){
    	return $this->belongsTo('App\User');
    }

    //metodo de one to one 
    public function foto(){
    	return $this->hasOne('App\Foto');
    }
}
