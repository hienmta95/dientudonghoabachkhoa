<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\trangcon;
use App\User;
use Auth;

class trangconController extends Controller
{
    public function getDanhSach()
    {
        $trangcon = trangcon::all()->sortByDesc("id");;
        // $trangcon = trangcon::all()->sortBy("id");;

    	return view('admin.trangcon.danhsach', ['trangcon'=>$trangcon]);
        //return response($trangcon, 201);
    }

    public function getThem()
    {
    	return view('admin.trangcon.them');
    }

    public function postThem(Request $req)
    {
    	$this->validate($req, 
    		[
                'tieude' => 'required',
                'noidung' => 'required',
    			'vitri' => 'required'
    		],
    		[
                'tieude.required' => 'Bạn chưa nhập hình ảnh',
                'noidung.required' => 'Bạn chưa nhập nội dung',
    			'vitri.required' => 'Bạn chưa nhập vị trí của tiêu đề trang con',
    		]);

    	$trangcon = new trangcon;
        $trangcon->noidung = $req->noidung;
        $trangcon->tieude = $req->tieude;
        $trangcon->mota = $req->mota;
    	$trangcon->vitri = $req->vitri;
        $trangcon->slug = changeTitle($req->tieude);


    	$trangcon->save();

    	return redirect('admin/trangcon/danhsach')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
    	$trangcon = trangcon::find($id);
		return view('admin.trangcon.sua', ['trangcon'=>$trangcon]);
        //return response($trangcon, 201);
    }

    public function postSua(Request $req, $id)
    {
    	$trangcon = trangcon::find($id);
    	$this->validate($req, 
    		[
                'tieude' => 'required',
                'noidung' => 'required',
    			'vitri' => 'required',
    		],
    		[
                'tieude.required' => 'Bạn chưa nhập tiêu đề',
                'noidung.required' => 'Bạn chưa nhập nội dung',
    			'vitri.required' => 'Bạn chưa nhập vị trí',
    		]);
        $trangcon->noidung = $req->noidung;
        $trangcon->tieude = $req->tieude;
        $trangcon->mota = $req->mota;
    	$trangcon->vitri = $req->vitri;
        $trangcon->slug = changeTitle($req->tieude);

    	$trangcon->save();
		
		return redirect('admin/trangcon/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
    	$trangcon = trangcon::find($id);
    	$trangcon->delete();

    	return redirect('admin/trangcon/danhsach/')->with('thongbao','Đã xóa thành công');
    }
}

