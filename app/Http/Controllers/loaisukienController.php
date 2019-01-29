<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisukien;
use App\nhomsanpham;

class loaisukienController extends Controller
{
    public function getDanhSach()
    {
    	$type = loaisukien::all();
    	return view('admin.loaisukien.danhsach',['type'=>$type]);
    }

    public function getThem()
    {
        $nhomsanpham = nhomsanpham::all();
    	return view('admin.loaisukien.them',['nhomsanpham'=>$nhomsanpham]);
    }
    public function postThem(Request $r)
    {
    	$this->validate($r, 
    	[
    		'ten' => 'required||unique:loaisukien|min:3|max:100',
            'mota' => 'required',
            'image' => 'required',
    	],
    	[
    		'ten.required' => 'Chưa nhập tên thể loại sự kiện',
            'mota.required' => 'Chưa nhập mô tả',
            'image.required' => 'Bạn chưa nhập hình ảnh',
            'ten.unique' => 'Đã có loại sự kiện này',
    		'ten.min' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự',
    		'ten.max' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự'
    	]);

    	$type= new loaisukien;
    	$type->ten = $r->ten;
        $type->mota = $r->mota;
    	$type->noidung = $r->noidung;
        // $type->id_nhomsanpham = $r->nhomsanpham;
    	$type->slug = changeTitle($r->ten);


        if($r->hasFile('image'))
        {
            $file = $r->file('image');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'JPG' && $duoi != 'PNG' && $duoi != 'JPEG')
            {
                return redirect('admin/loaisanpham/them')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }

            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("upload/loaisanpham/".$image));
            {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/loaisanpham",$image);
            $type->image = $image;
        }
        else
        {
            $type->image = "320x150.png";
        }

    	$type->save();
    	return redirect('admin/loaisanpham/danhsach')->with('thongbao','Thêm thành công loại sản phẩm');
    }

    public function getSua($id)
    {
        $nhomsanpham = nhomsanpham::all();
    	$type = loaisukien::find($id);
    	return view('admin.loaisukien.sua',['type'=>$type,'nhomsanpham'=>$nhomsanpham]);
    }
    public function postSua(Request $r, $id)
    {
    	$type = loaisukien::find($id);
    	$this->validate($r, 
    	[
    		'ten' => 'required|min:3|max:100',
            'mota' => 'required'
    	],
    	[
    		'ten.required' => 'Chưa nhập tên thể loại sự kiện',
            'mota.required' => 'Chưa nhập mô tả',
    		'ten.min' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự',
    		'ten.max' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự'
    	]);
    	$type->ten = $r->ten;
    	$type->mota = $r->mota;
        $type->noidung = $r->noidung;
        //$type->id_nhomsanpham = $r->nhomsanpham;
    	$type->slug = changeTitle($r->ten);

        if($r->hasFile('image'))
        {
            $file = $r->file('image');
            $duoi = $file->getClientOriginalExtension();
            
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'JPG' && $duoi != 'PNG' && $duoi != 'JPEG')
            {
                return redirect('admin/loaisanpham/them')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/loaisanpham/".$image)) {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/loaisanpham",$image);
            unlink("upload/loaisanpham/".$type->image);
            $type->image = $image;
        }
    	$type->save();
    	return redirect('admin/loaisanpham/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
    	$type = loaisukien::find($id);
    	$type->delete();
    	return redirect('admin/loaisanpham/danhsach')->with('thongbao','Xóa thành công');
    }

}
