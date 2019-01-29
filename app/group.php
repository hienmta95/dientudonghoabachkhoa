<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    protected $table = "groups";

    public function user()
    {
    	return $this->hasMany('App\User','id_group','id');
    }
    
    public function role()
    {
        return $this->belongsToMany('App\role', 'group_role');
    }
}
