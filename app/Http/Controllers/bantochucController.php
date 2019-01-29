<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sukien;
use App\bantochuc;

class bantochucController extends Controller
{
    public function getThem($id)
    {
    	$sukien = sukien::find($id);
        return view('admin.bantochuc.them',['sukien'=>$sukien]);
    }
    public function postThem(Request $r, $id)
    {
    	$this->validate($r, 
    	[
    		'ten' => 'required|min:3|max:100',
            'image' => 'required',
    	],
    	[
    		'ten.required' => 'Chưa nhập tên thành viên',
            'image.required' => 'Chưa nhập hình ảnh',
    		'ten.min' => 'Tên thành viên có độ dài trong khoảng từ 3-100 kí tự',
    		'ten.max' => 'Tên thành viên có độ dài trong khoảng từ 3-100 kí tự'
    	]);

    	$bantochuc = new bantochuc;
    	$bantochuc->ten = $r->ten;
        $bantochuc->mota = $r->mota;
    	$bantochuc->id_sukien = $id;
    	

        if($r->hasFile('image'))
        {
            $file = $r->file('image');
            $duoi = $file->getClientOriginalExtension();
            
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/bantochuc/them')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/bantochuc/".$image)) {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/bantochuc",$image);
            $bantochuc->image = $image;
        }
        else
        {
            $bantochuc->image = "";
        }
    	
    	$bantochuc->save();
    	return redirect('admin/sukien/sua/'.$id)->with('thongbao','Thêm thành công 1 thành viên trong ban tổ chức');
    }


    function getSua($id, $id_sukien)
    {
    	$bantochuc = bantochuc::find($id);
    	$sukien = sukien::find($id_sukien);
        return view('admin.bantochuc.sua',['sukien'=>$sukien,'bantochuc'=>$bantochuc]);
    }

    function postSua(Request $req, $id, $id_sukien)
    {
        $sukien = sukien::find($id_sukien);
    	$bantochuc = bantochuc::find($id);
    	$this->validate($req, 
    	[
    		'ten' => 'required|min:3|max:100',
    	],
    	[
    		'ten.required' => 'Chưa nhập tên thành viên',
    		'ten.min' => 'Tên thành viên có độ dài trong khoảng từ 3-100 kí tự',
    		'ten.max' => 'Tên thành viên có độ dài trong khoảng từ 3-100 kí tự'
    	]);

    	$bantochuc->ten = $req->ten;
        $bantochuc->mota = $req->mota;
    	$bantochuc->id_sukien = $id_sukien;
    	

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/bantochuc/them')->with('loihinhanh','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/bantochuc/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/bantochuc",$Hinh);
            unlink("upload/bantochuc/".$bantochuc->image);
            $bantochuc->image = $Hinh;
        }

    	
    	$bantochuc->save();
    	return view('admin.bantochuc.sua',['sukien'=>$sukien,'bantochuc'=>$bantochuc]);
    }






    public function getXoa($id, $id_sukien)
    {
    	$bantochuc = bantochuc::find($id);
    	$bantochuc->delete();

    	return redirect('admin/sukien/sua/'.$id_sukien)->with('thongbao','Đã xóa thành công 1 thành viên trong ban tổ chức');
    }
}
