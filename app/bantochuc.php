<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bantochuc extends Model
{
    protected $table = "bantochuc";

    public function sukien()
    {
    	return $this->belongsTo('App\sukien','id_sukien','id');
    }
}
