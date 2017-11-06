<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table='Registros';
    protected $fillable=array('kilometros','gasolina','kilos','login_id');
    protected $hidden=['created_at','updated_at'];

    public function login(){
    	return $this->belongsTo('App\Login');
    }

    public function foto(){
    	return $this->hasOne('App\Foto');
    }
}
