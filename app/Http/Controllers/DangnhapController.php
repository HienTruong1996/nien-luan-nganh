<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class DangnhapController extends Controller
{
	public function getDangnhapAdmin()
    {
        return view('admin/login/login');
    }
    public function postDangnhapAdmin(Request $req)
    {
       
        $this->validate($req,[
            'txtTaikhoang'=>'required|min:3|max:30',
            'txtPass'=>'required|min:3|max:30'
        ],[
            'txtTaikhoang.required'=>'Vui lòng nhập tài khoảng',
            'txtTaikhoang.min'=>'Tài Khoảng quá ngắn',
            'txtTaikhoang.max'=>'Tài khoảng quá dài',
            'txtPass.required'=>'Vui lòng nhập mật khẩu',
            'txtPass.min'=>'Mật khẩu quá ngắn',
            'txtPass.max'=>'Mật khẩu quá dài',

        ]);
        if(Auth::attempt(['email'=>$req->txtTaikhoang,'password'=>$req->txtPass]))
            {
                 return redirect('admin/chude/danhsach');
            }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng Nhập không Thành Công');

    		

        }
    }
    public function getDangxuatAdmin()
    {
         Auth::logout();
        return redirect('admin/dangnhap');
    }
}
