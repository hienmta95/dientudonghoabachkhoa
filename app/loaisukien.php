<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisukien extends Model
{
    protected $table = "loaisukien";

    public function sukien()
    {
    	return $this->hasMany('App\sukien','id_loaisukien','id');
    }
    public function nhomsanpham()
    {
    	return $this->hasMany('App\nhomsanpham','id_loaisukien','id');
    }
}
