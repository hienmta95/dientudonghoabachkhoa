<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sukien extends Model
{
    protected $table = "sukien";

    public function loaisukien()
    {
    	return $this->belongsTo('App\loaisukien','id_loaisukien','id');
    }

    public function nhomsanpham()
    {
        return $this->belongsTo('App\nhomsanpham','id_nhomsanpham','id');
    }

    public function bantochuc()
    {
    	return $this->hasMany('App\bantochuc','id_sukien','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\comment','id_sukien','id');
    }
}
