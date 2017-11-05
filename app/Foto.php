<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model{
    
    protected $table='Fotos';
    protected $fillable=array('picture','registro_id');
    protected $hidden=['created_at','updated_at'];

    public function registro(){
    	return $this->belongsTo('App\Registro');
    }
}
