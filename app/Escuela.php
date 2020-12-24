<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    public function escuelaSedes()
    {
    	return $this->hasMany(EscuelaSede::class);
    }
}
