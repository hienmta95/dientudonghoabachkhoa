<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhomsanpham;
use App\loaisukien;

class nhomsanphamController extends Controller
{
    public function getDanhSach()
    {
    	$nhomsanpham = nhomsanpham::all();
    	return view('admin.nhomsanpham.danhsach',['type'=>$nhomsanpham]);
    }

    public function getThem()
    {
        $loaisukien = loaisukien::all();
        return view('admin.nhomsanpham.them',['loaisukien'=>$loaisukien]);
    }
    public function postThem(Request $r)
    {
    	$this->validate($r, 
    	[
    		'ten' => 'required||unique:nhomsanpham|min:3|max:100',
    	],
    	[
    		'ten.required' => 'Chưa nhập tên',
            'ten.unique' => 'Đã có nhóm sản phẩm này này',
    		'ten.min' => 'Tên có độ dài trong khoảng từ 3-100 kí tự',
    		'ten.max' => 'Tên có độ dài trong khoảng từ 3-100 kí tự'
    	]);

    	$type= new nhomsanpham;
    	$type->ten = $r->ten;
        $type->id_loaisukien = $r->loaisukien;
        $type->mota = $r->mota;
        $type->slug = changeTitle($r->ten);
    	$type->save();
    	return redirect('admin/nhomsanpham/danhsach')->with('thongbao','Thêm thành công');
    }


    public function getSua($id)
    {
        $loaisukien = loaisukien::all();
        $nhomsanpham = nhomsanpham::find($id);
        return view('admin.nhomsanpham.sua',['loaisukien'=>$loaisukien, 'type'=>$nhomsanpham]);
    }

    public function postSua(Request $r, $id)
    {
        $nhom = nhomsanpham::find($id);
        $this->validate($r, 
        [
            'ten' => 'required|min:3|max:100',
        ],
        [
            'ten.required' => 'Chưa nhập tên',
            'ten.min' => 'Tên có độ dài trong khoảng từ 3-100 kí tự',
            'ten.max' => 'Tên có độ dài trong khoảng từ 3-100 kí tự'
        ]);

        $nhom->ten = $r->ten;
        $nhom->mota = $r->mota;
        $nhom->id_loaisukien = $r->loaisukien;
        $nhom->slug = changeTitle($r->ten);
        $nhom->save();



        $nhom->save();
        return redirect('admin/nhomsanpham/sua/'.$id)->with('thongbao','Sửa nhóm thành công');
    }


    public function getXoa($id)
    {
    	$type = nhomsanpham::find($id);
    	$type->delete();
    	return redirect('admin/nhomsanpham/danhsach')->with('thongbao','Xóa thành công');
    }

}
