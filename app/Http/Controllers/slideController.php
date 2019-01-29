<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\User;
use Auth;

class slideController extends Controller
{
    public function getDanhSach()
    {
    	$slide = slide::all();

    	return view('admin.slide.danhsach', ['slide'=>$slide]);
        //return response($slide, 201);
    }

    public function getThem()
    {
    	return view('admin.slide.them');
    }

    public function postThem(Request $req)
    {
    	$this->validate($req, 
    		[
    			'image' => 'required'
    		],
    		[
    			'image.required' => 'Bạn chưa nhập hình ảnh',
    		]);

    	$slide = new slide;
        $slide->noidung = $req->noidung;
    	$slide->tieude = $req->tieude;

    	if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/them')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/slide/".$image)) {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/slide",$image);
            $slide->image = $image;
        }
        else
        {
            $slide->image = "";
        }
    	$slide->save();

    	return redirect('admin/slide/danhsach')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
    	$slide = slide::find($id);
		return view('admin.slide.sua', ['slide'=>$slide]);
        //return response($slide, 201);
    }

    public function postSua(Request $req, $id)
    {
    	$slide = slide::find($id);
    	// $this->validate($req, 
    	// 	[
    	// 		'image' => 'required',
    	// 	],
    	// 	[
    	// 		'image.required' => 'Bạn chưa nhập hình ảnh',
    	// 	]);
        $slide->noidung = $req->noidung;
    	$slide->tieude = $req->tieude;

    	if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/them')->with('loihinhanh','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/slide/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/slide",$Hinh);
            //unlink("upload/slide/".$slide->image);
            $slide->image = $Hinh;
        }

    	$slide->save();
		
		return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
    	$slide = slide::find($id);
    	$slide->delete();

    	return redirect('admin/slide/danhsach/')->with('thongbao','Đã xóa thành công');
    }
}

