<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public function escuela()
    {
    	return $this->belongsTo(Escuela::class);
    }
}
