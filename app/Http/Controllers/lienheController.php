<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisukien;
use App\lienhe;

class lienheController extends Controller
{
    public function getDanhSach()
    {
    	$type = lienhe::all();
    	return view('admin.lienhe.danhsach',['type'=>$type]);
    }

    public function getSua($id)
    {
    	$type = lienhe::find($id);
    	return view('admin.lienhe.sua',['type'=>$type]);
    }
    public function postSua(Request $r, $id)
    {
    	$type = lienhe::find($id);
    	$this->validate($r, 
        [
            'hoten' => 'required|min:3|max:100',
            'email' => 'required',
            'sdt' => 'required',
            'noidung' => 'required',
        ],
        [
            'hoten.required' => 'Chưa nhập họ tên',
            'email.required' => 'Chưa nhập email',
            'sdt.required' => 'Chưa nhập số điện thoại',
            'noidung.required' => 'Chưa nhập nội dung',
            'ten.min' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự',
            'ten.max' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự'
        ]);

    	$type->hoten = $r->hoten;
    	$type->sdt = $r->sdt;
        $type->email = $r->email;
    	$type->diachi = $r->diachi;
        $type->noidung = $r->noidung;
        $type->status = $r->status;

    	$type->save();
    	return redirect('admin/lienhe/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
    	$type = lienhe::find($id);
    	$type->delete();
    	return redirect('admin/lienhe/danhsach')->with('thongbao','Xóa thành công');
    }

}
