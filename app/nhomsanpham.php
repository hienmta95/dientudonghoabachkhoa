<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhomsanpham extends Model
{
    protected $table = "nhomsanpham";

    public function sukien()
    {
    	return $this->hasMany('App\sukien','id_nhomsanpham','id');
    }
    public function loaisukien()
    {
    	return $this->belongsTo('App\loaisukien','id_loaisukien','id');
    }
}
