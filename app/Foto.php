<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model{
    
    protected $table='Fotos';
    protected $fillable=array('picture');
    protected $hidden=['created_at','updated_at'];

    public function Registro(){
    	return $this->belongsTo('App\Registro');
    }
}
