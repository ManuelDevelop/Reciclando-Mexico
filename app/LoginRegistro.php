<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginRegistro extends Model
{
    protected $table='LoginRegistros';
    protected $fillable=array('login_id','registro_id');
    protected $hidden=['created_at','updated_at'];

    public function login(){
    	return $this->belongsTo('App\Login');
    }
}
