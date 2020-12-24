<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscuelaSede extends Model
{
    public function escuela()
    {
    	return $this->belongsTo(Escuela::class);
    }

    public function sede()
    {
    	return $this>belongsTo(Sede::class);
    }

    public function user()
    {
    	return $this>belongsTo(User::class);
    }
}
