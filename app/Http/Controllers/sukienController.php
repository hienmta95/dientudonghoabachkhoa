<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisukien;
use App\sukien;
use App\nhomsanpham;
use App\comment;

class sukienController extends Controller
{
    public function getDanhSach()
    {
    	$sukien = sukien::all();
        
    	return view('admin.sukien.danhsach',['sukien'=>$sukien]);
    }

    public function getThem()
    {
        $nhomsanpham = nhomsanpham::all();
    	$loaisukien = loaisukien::all();
        return view('admin.sukien.them',['loaisukien'=>$loaisukien, 'nhomsanpham'=>$nhomsanpham]);
    }
    public function postThem(Request $r)
    {
    	$this->validate($r, 
    	[
    		'ten' => 'required|unique:sukien|min:3|max:100',
            'loaisukien' => 'required',
            'image' => 'required',
            // 'model' => 'required',
            
    	],
    	[
    		'ten.required' => 'Chưa nhập tên thể sản phẩm',
            'loaisukien.required' => 'Chưa nhập loại sản phẩm',
            'image.required' => 'Chưa nhập hình ảnh của sp',
            // 'model.required' => 'Chưa nhập model',
           
            'ten.unique' => 'Đã có loại sản phẩm này',
    		'ten.min' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự',
    		'ten.max' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự'
    	]);

    	$sukien = new sukien;
    	$sukien->ten = $r->ten;
        $sukien->slug = changeTitle($r->ten);
        $sukien->model = $r->model;
        $sukien->congsuat = $r->congsuat;
        $sukien->dienap = $r->dienap;
        $sukien->tinhtrang = $r->tinhtrang;
        $sukien->mausac = $r->mausac;
        $sukien->baohanh = $r->baohanh;
        $sukien->ungdung = $r->ungdung;
        $sukien->xuatxu = $r->xuatxu;
        $sukien->kichthuoc = $r->kichthuoc;
        $sukien->tomtat = $r->tomtat;
        $sukien->noidung = $r->noidung;
        $sukien->id_loaisukien = $r->loaisukien;
        $sukien->id_nhomsanpham = $r->nhomsanpham;

        if($r->hasFile('image'))
        {
            $file = $r->file('image');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'JPG' && $duoi != 'PNG' && $duoi != 'JPEG')
            {
                return redirect('admin/sanpham/them')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }

            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("upload/sanpham/".$image));
            {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/sanpham",$image);
            $sukien->image = $image;
        }
        else
        {
            $sukien->image = $image;
        }


        if($r->hasFile('catalogues'))
        {
            $file = $r->file('catalogues');

            $duoi = $file->getClientOriginalExtension();
            

            $name = $file->getClientOriginalName();
            $catalogues = str_random(3)."__".$name;
            while(file_exists("upload/catalogues/".$catalogues));
            {
                $catalogues = str_random(3)."__".$name;
            }
            $file->move("upload/catalogues",$catalogues);
            $sukien->catalogues = $catalogues;
        }
        else
        {
            $sukien->catalogues = '';
        }
    	
    	$sukien->save();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','Thêm thành công sản phẩm');
    }

    public function getSua($id)
    {
        $loaisukien = loaisukien::all();
        $nhomsanpham = nhomsanpham::all();
        $sukien = sukien::find($id);
        return view('admin.sukien.sua', ['sukien'=>$sukien], ['loaisukien'=>$loaisukien, 'nhomsanpham'=>$nhomsanpham]);
    }

    public function postSua(Request $r, $id)
    {
        $sukien = sukien::find($id);
        $this->validate($r, 
        [
            'ten' => 'required|min:3|max:100',
            'loaisukien' => 'required',
            // 'model' => 'required',
        
        ],
        [
            'ten.required' => 'Chưa nhập tên sản phẩm',
            'loaisukien.required' => 'Chưa nhập loại sản phẩm',
            // 'model.required' => 'Chưa nhập model',
          
            'ten.min' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự',
            'ten.max' => 'Tên loại có độ dài trong khoảng từ 3-100 kí tự'
        ]);

        $sukien->ten = $r->ten;
        $sukien->slug = changeTitle($r->ten);
        $sukien->model = $r->model;
        $sukien->congsuat = $r->congsuat;
        $sukien->dienap = $r->dienap;
        $sukien->tinhtrang = $r->tinhtrang;
        $sukien->baohanh = $r->baohanh;
        $sukien->ungdung = $r->ungdung;
        $sukien->xuatxu = $r->xuatxu;
        $sukien->mausac = $r->mausac;
        $sukien->kichthuoc = $r->kichthuoc;
        $sukien->tomtat = $r->tomtat;
        $sukien->noidung = $r->noidung;
        $sukien->id_loaisukien = $r->loaisukien;
        $sukien->id_nhomsanpham = $r->nhomsanpham;

        if($r->hasFile('image'))
        {
            $file = $r->file('image');
            $duoi = $file->getClientOriginalExtension();
            
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'JPG' && $duoi != 'PNG' && $duoi != 'JPEG')
            {
                return redirect('admin/sanpham/them')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/sanpham/".$image)) {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/sanpham",$image);
            //unlink("upload/sanpham/".$sukien->image);
            $sukien->image = $image;
        }

 
        if($r->hasFile('catalogues'))
        {
            $file = $r->file('catalogues');
            $duoi = $file->getClientOriginalExtension();
            
            
            $name = $file->getClientOriginalName();
            $catalogues = str_random(3)."__".$name;
            while (file_exists("upload/catalogues/".$catalogues)) {
                $catalogues = str_random(3)."__".$name;
            }
            $file->move("upload/catalogues",$catalogues);
            //unlink("upload/catalogues/".$sukien->catalogues);
            $sukien->catalogues = $catalogues;
        }



        $sukien->save();
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa sản phẩm thành công');
    }

    public function getXoa($id)
    {
    	$sukien = sukien::find($id);
        //unlink("upload/sanpham/".$sukien->image);
        //unlink("upload/catalogues/".$sukien->catalogues);
    	$sukien->delete();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }
}
