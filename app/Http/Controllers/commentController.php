<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\comment;
use App\sukien;

class commentController extends Controller
{
    public function postComment(Request $req, $id)
    {
        $this->validate($req, 
            [
                'noidung' => 'required'
            ],
            [
                'noidung.required' => 'Bạn chưa nhập nội dung comment',
            ]);
        $sukien = sukien::find($id);
    	$idSukien = $id;
        $comment = new comment;
        $comment->id_sukien = $idSukien;
        $comment->id_user = Auth::user()->id;
        $comment->noidung = $req->noidung;
        $comment->save();
        return redirect("sukien/$id/".$sukien->slug.".html")->with('thongbao','Viết bình luận thành công');
    }

    

    public function getXoa($id, $id_sukien)
    {
    	$comment = comment::find($id);
    	$comment->delete();

    	return redirect('admin/sukien/sua/'.$id_sukien)->with('thongbao','Xóa comment thành công');
    }
}
