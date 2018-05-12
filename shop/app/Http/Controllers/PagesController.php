<?php

namespace App\Http\Controllers;

use App\shop_khachhang;
use Illuminate\Http\Request;
use App\shop_chude;
use App\shop_mauchudao;
use App\shop_loai;
use App\shop_slider;
use App\shop_sanpham;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    function trangchu()
    {
    	return view('pages.trangchuadmin');
    }

    function lienhe()
    {
        return view('pages.lienhe');
    }
    function dieukhoan()
    {
        return view('pages.tac');
    }
    function khuyenmai()
    {
        return view('pages.offer');
    }
    function giohang()
    {
        return view('pages.summary');
    }




    function chude($ma)
    {
        $sanphamtheochude =  DB::table('shop_sanpham')->where('cd_ma',$ma)->paginate(6);
        $tenchude = shop_chude::find($ma);
        foreach ($sanphamtheochude as $sp) {
            $sp->sp_moTa = strip_tags($sp->sp_moTa);
        }
        return view('pages.sanphamtheochude',['sanphamtheochude'=>$sanphamtheochude,'tenchude'=>$tenchude]);
    }
    function mau($ma)
    {
        $sanphamtheomau =  DB::table('shop_sanpham')->where('mcd_ma',$ma)->paginate(6);
        $tenmau = shop_mauchudao::find($ma);
        return view('pages.sanphamtheomau',['sanphamtheomau'=>$sanphamtheomau,'tenmau'=>$tenmau]);
    }
    function loai($ma)
    {
        $sanphamtheoloai =  DB::table('shop_sanpham')->where('l_ma',$ma)->paginate(6);
        $tenloai = shop_loai::find($ma);
        return view('pages.sanphamtheoloai',['sanphamtheoloai'=>$sanphamtheoloai,'tenloai'=>$tenloai]);
    }
    function chitiet($ma)
    {
        
        $sanpham = shop_sanpham::find($ma);
        $chude2 =  DB::table('shop_sanpham')->where('sp_ma',$ma)->value('cd_ma');
        $chude = shop_chude::find($chude2);
        $chude3 = $chude->getsanpham;
        foreach ($chude3 as $cd3) {
             $cd3->sp_moTa = strip_tags($cd3->sp_moTa);
        }
        return view('pages.chitiet_sanpham',['sanpham'=>$sanpham,'chude3'=>$chude3]);
    }
      

    function __construct()
    {
    	$slider = shop_slider::all();
        $chude = shop_chude::all();
        $sanpham = shop_sanpham::all();
        $mauchudao = shop_mauchudao::all();
        $loai = shop_loai::all();
    	view()->share('slider',$slider);
        view()->share('chude',$chude);
        view()->share('sanpham',$sanpham);
        view()->share('mauchudao',$mauchudao);  
        view()->share('loai',$loai);


    }

    public function getDangnhap()
    {
        return view('Pages.dangnhap');
    }
    public function postDangnhap(Request $req)
    {

        $this->validate($req,[
            'inputEmail'=>'required|min:3|max:30',
            'inputPassword'=>'required|min:3|max:30'
        ],[
            'inputEmail.required'=>'Vui lòng nhập tài khoảng',
            'inputEmail.min'=>'Tài Khoảng quá ngắn',
            'inputEmail.max'=>'Tài khoảng quá dài',
            'inputPassword.required'=>'Vui lòng nhập mật khẩu',
            'inputPassword.min'=>'Mật khẩu quá ngắn',
            'inputPassword.max'=>'Mật khẩu quá dài',

        ]);
        if(Auth::attempt(['email'=>$req->inputEmail,'password'=>$req->inputPassword]))
        {
            return redirect('trangchu');
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Đăng Nhập không Thành Công');



        }
    }
    public function getDangxuat()
    {
        Auth::logout();
        return redirect('trangchu');
    }

    public function postDangky(Request $req){
        $this->validate($req,
            [
                'txtEmail' => 'required|unique:shop_khachhang,kh_email|min:3|max:100'
            ],
            [
                'txtEmail.required'=>'bạn chưa nhập tên chủ đề',
                'txtEmail.unique'=>'chủ đề bị trùng',
                'txtEmail.min'=>'Tên quá ngắn',
                'txtEmail.max'=>'Tên quá dài'
            ]
        );
        $khachhang = new shop_khachhang();
        $khachhang->kh_ten = $req->txtTen;
        $khachhang->kh_taiKhoang = 'abc';
        $khachhang->kh_matKhau = bcrypt($req->txtMatkhau);
        $khachhang->kh_gioiTinh = $req->rdoGioitinh;
        $khachhang->kh_email = $req->txtEmail;
        $khachhang->kh_ngaySinh = $req->txtNgaysinh;
        $khachhang->kh_diaChi = $req->txtDiachi;
        $khachhang->kh_dienThoai = $req->txtDienthoai;


        $khachhang->save();

        return redirect('dangnhap')->with('thongbao','Tạo Tài Khoản thành công');
    }


}
