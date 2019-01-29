<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\loaisukien;
use App\group;
use App\role;
use App\group_role;

class ajaxController extends Controller
{
    public function getLoaisukien($id_theloai)
    {
    	$loaisukien = loaisukien::where('id_theloai', $id_theloai)->get();
        foreach ($loaisukien as $loai)
        {	
        	echo "<option value='".$loai->id."'>".$loai->ten."</option>";
        }
    }

    public function setGrouprole($id_group, $id_role)
    {
        echo '<script type="text/javascript">alert("saved!");</script>';
    	$group_role = new group_role;
    	$group_role->group_id = $id_group;
    	$group_role->role_id = $id_role;
    	$group_role->save();
    }
	
	public function deleteGrouprole($id_group, $id_role)
    {
        $group_role = group_role::where('group_id', '=', $id_group)->where('role_id', '=', $id_role)->get();

        foreach ($group_role as $key ) {
            $key->delete();
        }
    }


}
