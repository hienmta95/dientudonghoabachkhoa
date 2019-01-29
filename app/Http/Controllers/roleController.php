<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\role;
use App\group_role;

class roleController extends Controller
{
    public function getDanhSach()
    {
    	$role = role::all();
    	return view('admin.role.danhsach',['type'=>$role]);
    }

    public function getThem()
    {
    	return view('admin.role.them');
    }
    public function postThem(Request $r)
    {
    	$this->validate($r, 
    	[
    		'ten' => 'required||unique:theloai|min:3|max:100',
    	],
    	[
    		'ten.required' => 'Chưa nhập tên',
            'ten.unique' => 'Đã có tên này',
    		'ten.min' => 'Tên có độ dài trong khoảng từ 3-100 kí tự',
    		'ten.max' => 'Tên có độ dài trong khoảng từ 3-100 kí tự'
    	]);

    	$type= new role;
    	$type->ten = $r->ten;
    	$type->save();
    	return redirect('admin/role/danhsach')->with('thongbao','Thêm thành công 1');
    }

    public function getSua($id)
    {
    	
    }
    public function postSua(Request $r, $id)
    {
    	
    }

    public function getXoa($id)
    {
    	$type = role::find($id);
    	$type->delete();
    	return redirect('admin/role/danhsach')->with('thongbao','Xóa thành công');
    }

}
