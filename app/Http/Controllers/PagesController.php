<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\slide;
use App\lienhe;
use App\User;
use App\sukien;
use App\trangcon;
use App\loaisukien;
use App\nhomsanpham;
use Mail;
use App\Notifications\ToUser;
use App\Notifications\ToAdmin;


class PagesController extends Controller
{
    protected $mail_admin = 'hien.kbhbt@gmail.com';

    function __construct()
    {
        $slide1 = slide::all();
        $menu = loaisukien::all();
        $trangcon = trangcon::all();
        view()->share('slide', $slide1);
        view()->share('menu', $menu);
        view()->share('trangcon', $trangcon);
        // view()->share('footer', $menu);
    }

   
    function getIndex()
    {
        $data = loaisukien::all();
        //$data = $sukien->get();
        //$data = sukien::where('noibat',1)->paginate(2);

        return view('pages.trangchu',['data'=>$data]);
    }

    function trangcon($slug, $id)
    {
        $page = trangcon::find($id);
        //var_dump($id);
        //var_dump($page);
        return view('pages.trangcon',['page'=>$page]);
    }

    function sukien($id)
    {
        $sukien = sukien::find($id);
        $loaisukien = loaisukien::find($sukien->id_loaisukien);
        $tinlienquan = sukien::where('id_loaisukien', $sukien->id_loaisukien)->where('id','!=',$sukien->id)->orderBy('id', 'desc')->take(6)->get();
        return view('pages.chitiet',['sukien'=>$sukien, 'tinlienquan'=>$tinlienquan, 'loaisukien'=>$loaisukien]);
    }
    
    function loaisukien($id)
    {   
        $loaisukien = loaisukien::find($id);
        $sukien = sukien::where('id_loaisukien', $id)->orderBy('id', 'desc')->paginate(9);
        //var_dump($sukien);
        return view('pages.loaisukien',['loaisukien'=>$loaisukien, 'sukien'=>$sukien]);
    }

    function nhomsanpham( $id)
    {   
        $nhomsanpham = nhomsanpham::find($id);
        $sukien = sukien::where('id_nhomsanpham', $id)->orderBy('id', 'desc')->paginate(9);
        //var_dump($nhomsanpham);
        return view('pages.nhomsanpham',['sanpham'=>$sukien, 'nhom'=>$nhomsanpham]);
    }

    function getDangnhap()
    {
        return view('pages.dangnhap');  
    } 

    function postDangnhap(Request $req)
    {
        $this->validate($req, 
            [
                'email' => 'required',
                'password' => 'required|min:3|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập password',
                'password.min' => 'Password có độ dài trong khoảng 3-32 kí tự',
                'password.max' => 'Password có độ dài trong khoảng 3-32 kí tự'
            ]);
        
        $email = htmlspecialchars($req->email, ENT_QUOTES, "UTF-8");

        if(Auth::attempt(['email'=>$email, 'password'=>$req->password]))
        {
            return redirect('/');
        }
        else
        {
            return redirect('dangnhap')->with('loi','Đăng nhập không thành công');
        } 
    } 

    function getDangxuat()
    {
        Auth::logout();
        return redirect('/');
    }

    function getNguoidung()
    {
        return view('pages.nguoidung');
    }

    function postNguoidung(Request $req)
    {
        $user = Auth::user();
        $this->validate($req, 
            [
                'name' => 'required|min:3',
                'email' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên user',
                'email.required'=> 'Bạn chưa nhập email user',
                'name.min'=>'Tên user phải có độ dài lơn hơn 3 kí tự',
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
                'passwordAgain.same'=>'Pass nhập lại phải giống pass ban đầu',
            ]);
            $user->password = bcrypt($req->password);
        }

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('nguoidung')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
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
        
        return redirect('nguoidung')->with('thongbao','Sửa thành công');
    }

    function getDangki()
    {
        return view('pages.dangki');
    }

    function postDangki(Request $req)
    {
        $this->validate($req, 
            [
                'name' => 'required|min:3',
                'email' => 'required',
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên user',
                'email.required'=> 'Bạn chưa nhập email user',
                'password.required' => 'Bạn chưa nhập pass',
                'passwordAgain.required' => 'Bạn chưa nhập lai password',
                'name.min'=>'Tên userphải có độ dài lơn hơn 3 kí tự',
                'password.min'=>'Pass phải có độ dài trong khoảng 3-100 kí tự',
                'password.max'=>'Pass phải có độ dài trong khoảng 3-100 kí tự',
                'passwordAgain.same'=>'Pass nhap lai phai giong pass ban dau',
            ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        //$user->level = 0;
        if($req->hasFile('image'))
        {
            $file = $req->file('image');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('dangki')->with('loi','Bạn chỉ được nhập file đuôi png, jpg, jpeg');
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

        return redirect('dangki')->with('thongbao','Đã đăng kí thành công');
    }

    public function getLienhe()
    {
        return view('pages.lienhe');
    }
    public function postLienhe(Request $req)
    {

        $this->validate($req,
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

        $lienhe = new lienhe;

        $lienhe->hoten = $req->hoten;
        $lienhe->email = $req->email;
        $lienhe->sdt = $req->sdt;
        $lienhe->diachi = $req->diachi;
        $lienhe->noidung = $req->noidung;
        $lienhe->status = 0;

        $lienhe->save();

        $this->sendMailUser($req->email, $req->all());
        $this->sendMailAdmin($this->mail_admin, $req->all());

        return redirect('lienhe')->with('thongbao', 'Gửi liên hệ thành công');
    }

    public function sendMailUser($email, $data)
    {
        $user = new User();
        $user->email = $email;
        $user->notify(new ToUser($data));
    }

    public function sendMailAdmin($email, $data)
    {
        $user = new User();
        $user->email = $email;
        $user->notify(new ToAdmin($data));
    }

    function Timkiem(Request $req)
    {
        $tukhoa = $req->tukhoa;
        $sukien = sukien::where('ten','like',"%$tukhoa%")->orWhere('noidung','like',"%$tukhoa%")->orderBy('id', 'desc')->take(15)->get();
        return view('pages.timkiem',['sukien'=>$sukien, 'tukhoa'=>$tukhoa]);
    }

}
