<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    public function comuna()
    {
    	return $this->belongsTo(Comuna::class);
    }

    public function escuelaSedes()
    {
    	return $this->hasMany(EscuelaSede::class);
    }
}
