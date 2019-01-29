<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\group;
use App\user1;
class userController extends Controller
{
    public function getDanhSach()
    {
    	$user = User::all();
    	return view('admin.user.danhsach', ['user'=>$user]);
    }

    public function getThem()
    {
        $group = group::all();
    	return view('admin.user.them',['group'=>$group]);
    }

    public function postThem(Request $req)
    {
    	$this->validate($req, 
    		[
    			'name' => 'required|min:3',
    			'email' => 'required|unique:users',
    			'password' => 'required|min:3|max:32',
    			'passwordAgain' => 'required|same:password'
    		],
    		[
    			'name.required' => 'Bạn chưa nhập tên user',
    			'email.required'=> 'Bạn chưa nhập email user',
                'email.unique' => 'Email nay da co nguoi su dung',
    			'password.required' => 'Bạn chưa nhập pass',
    			'passwordAgain.required' => 'Bạn chưa nhập lai password',
    			'name.min'=>'Tên userphải có độ dài lơn hơn 3 kí tự',
    			'password.min'=>'Pass phải có độ dài trong khoảng 3-100 kí tự',
    			'password.max'=>'Pass phải có độ dài trong khoảng 3-100 kí tự',
    			'passwordAgain.same'=>'Pass nhap lai phai giong pass ban dau',
    		]);
    	$user = new User;
    	$user->name = $req->name;
        $user->id_group = $req->group;
    	$user->email = $req->email;
    	$user->password = bcrypt($req->password);

        if($req->hasFile('image'))
        {
            $file = $req->file('image');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/user/them')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }

            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("upload/user/".$image));
            {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/user",$image);
            $user->image = $image;
        }
        else
        {
            $user->image = "320.jpg";
        }

    	$user->save();

    	return redirect('admin/user/danhsach')->with('thongbao','Thêm thành công user');
    }

    public function getSua($id)
    {
    	$user = User::find($id);
		return view('admin.user.sua', ['user'=>$user]);
    }

    public function postSua(Request $req, $id)
    {
    	$user = User::find($id);
    	$this->validate($req, 
    		[
    			'name' => 'required|min:3',
    			'email' => 'required',
    		],
    		[
    			'name.required' => 'Bạn chưa nhập tên user',
    			'email.required'=> 'Bạn chưa nhập email user',
    			'name.min'=>'Tên userphải có độ dài lơn hơn 3 kí tự',
    		]);
    	$user->name = $req->name;
    	$user->email = $req->email;

    	if($req->changePassword == "on")
    	{
			$this->validate($req, 
    		[
    			'password' => 'required|min:3|max:32',
    			'passwordAgain' => 'required|same:password'
    		],
    		[
    			'password.required' => 'Bạn chưa nhập pass',
    			'passwordAgain.required' => 'Bạn chưa nhập lai password',
    			'matkhaumatkhaumatkhau.min'=>'Pass phải có độ dài trong khoảng 3-100 kí tự',
    			'matkhaumatkhau.max'=>'Pass phải có độ dài trong khoảng 3-100 kí tự',
    			'passwordAgain.same'=>'Pass nhap lai phai giong pass ban dau',
    		]);
    		$user->password = bcrypt($req->password);
    	}

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/user/them')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/user/".$image)) {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/user",$image);
            unlink("upload/user/".$user->image);
            $user->image = $image;
        }

    	$user->save();
		
		return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
    	$user = User::find($id);
    	$user->delete();

    	return redirect('admin/user/danhsach/')->with('thongbao','Đã xóa thành công');
    }

    public function getDangnhapAdmin()
    {
        return view('admin.login');   
    }

    public function postDangnhapAdmin(Request $req)
    {
        $this->validate($req, 
            [
                'name' => 'required',
                'password' => 'required|min:3|max:32'
            ],
            [
                'name.required' => 'Bạn chưa nhập username',
                'password.required' => 'Bạn chưa nhập password',
                'password.min' => 'Password có độ dài trong khoảng 3-32 kí tự',
                'password.max' => 'Password có độ dài trong khoảng 3-32 kí tự'
            ]);
    


        if(Auth::attempt(['name'=>$req->name, 'password'=>$req->password]))

        {
            return redirect('admin/dashboard');
        }
        else
        {
            return redirect('admin/dangnhap')->with('loi','Đăng nhập không thành công');
        } 
    }

    public function getDangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

}
