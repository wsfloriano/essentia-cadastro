<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{


    protected $fillable = [
        'name',
        'email',
        'password',
        'telefone'
    ];


    public function fotos() {
		return $this->hasMany('App\Foto');
	}
}
