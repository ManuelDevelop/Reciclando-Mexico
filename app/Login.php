<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table='Logins';
    protected $fillable=array('alias','pass');
    protected $hidden=['created_at','updated_at'];

    public function registro(){
    	return $this->hasMany('App\Registro');
    }
}
