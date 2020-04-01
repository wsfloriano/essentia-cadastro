<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
    	'id',
        'foto',
        'thumb_tiny',
        'cliente_id',
	];
}
