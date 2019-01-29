<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = "role";

    public function group()
    {
        return $this->belongsToMany('App\group', 'group_role');
    }
}
