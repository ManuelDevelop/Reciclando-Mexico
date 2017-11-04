<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table='Registros';
    protected $fillable=array('kilometros','gasolina','kilos','foto');
    protected $hidden=['created_at','updated_at'];

    public function Foto(){
    	return $this->hasOne('App\Foto');
    }
}
