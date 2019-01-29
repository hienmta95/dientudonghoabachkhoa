<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\group;
use App\group_role;
use App\role;

class groupController extends Controller
{
    public function getDanhSach()
    {
    	$group = group::all();
        
    	return view('admin.group.danhsach',['type'=>$group]);
    }

    public function getThem()
    {
    	return view('admin.group.them');
    }
    public function postThem(Request $req)
    {
    	$this->validate($req, 
    	[
    		'ten' => 'required|unique:theloai|min:3|max:100',
    	],
    	[
    		'ten.required' => 'Chưa nhập tên',
            'ten.unique' => 'Đã có tên này',
    		'ten.min' => 'Tên có độ dài trong khoảng từ 3-100 kí tự',
    		'ten.max' => 'Tên có độ dài trong khoảng từ 3-100 kí tự'
    	]);


    	$group= new group;
    	$group->ten = $req->ten;
    	$group->save();
    	return redirect('admin/group/danhsach')->with('thongbao','Thêm thành công, hãy click vào sửa để thêm quyền cho group user bạn vừa tạo.');
    }

    public function getSua($id)
    {
        $role = role::all();
        $group = group::find($id);
        return view('admin.group.sua',['role'=>$role, 'group'=>$group]);
    	
    }
    public function postSua(Request $req, $id)
    {
    	$group = group::find($id);
        $this->validate($req, 
        [
            'ten' => 'required|min:3|max:100',
        ],
        [
            'ten.required' => 'Chưa nhập tên',
            'ten.min' => 'Tên có độ dài trong khoảng từ 3-100 kí tự',
            'ten.max' => 'Tên có độ dài trong khoảng từ 3-100 kí tự'
        ]);
        $group->ten = $req->ten;
        $group->save();


        return redirect('admin/group/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
    	$type = group::find($id);
    	$type->delete();
    	return redirect('admin/group/danhsach')->with('thongbao','Xóa thành công');
    }

}
