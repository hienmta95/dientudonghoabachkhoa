<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = "comment";

    public function sukien()
    {
    	return $this->belongsTo('App\sukien','id_sukien','id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
}
