<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table='Registros';
    protected $fillable=array('kilometros','gasolina','kilos','login_id');
    protected $hidden=['created_at','updated_at'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function foto(){
    	return $this->hasOne('App\Foto');
    }
}
