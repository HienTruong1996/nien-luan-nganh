<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_khachhang;

class shopKhachhangController extends Controller
{
    public function getDanhsach(){
    	$khachhang = shop_khachhang::all();
    	return view('admin.khachhang.danhsach',['khachhang'=>$khachhang]);
    }
    public function getSua($id){
    	$quyen = shop_quyen::all();
    	$khachhang = shop_khachhang::find($id);

    	return view('admin.khachhang.sua',['khachhang'=>$khachhang,'quyen'=>$quyen]);
    }
    public function postSua(Request $req ,$id){
    	$khachhang = shop_khachhang::find($id);
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_khachhang,kh_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên nhân viên',
    			'txtTen.unique'=>'chủ đề bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);

    	$khachhang->kh_ten = $req->txtTen;
    	$khachhang->kh_taiKhoang = $req->txtTaikhoan;
    	$khachhang->kh_matKhau = $req->txtMatkhau;
    	$khachhang->kh_gioiTinh = $req->rdoGioitinh;
    	$khachhang->kh_email = $req->txtEmmail;
    	$khachhang->kh_ngaySinh = $req->txtNgaysinh;
        $khachhang->kh_diaChi = $req->txtDiachi;
        $khachhang->kh_dienThoai = $req->txtDienthoai;

    	$khachhang->save();

    	return redirect('admin/khachhang/sua/'.$id)->with('thongbao','sửa thành công');  
    }

    public function getXoa($cd){
    	$khachhang = shop_khachhang::find($cd);
    	$khachhang->Delete();
    	return redirect('admin/khachhang/danhsach')->with('thongbao','Xóa thành công');
    }



    public function getThem(){
    	$quyen = shop_quyen::all();
    	return view('admin.khachhang.them',['quyen'=>$quyen]);
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_khachhang,kh_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên chủ đề',
    			'txtTen.unique'=>'chủ đề bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);
    	$khachhang = new shop_khachhang;
    	$khachhang->kh_ten = $req->txtTen;
    	$khachhang->kh_taiKhoang = $req->txtTaikhoan;
    	$khachhang->kh_matKhau = $req->txtMatkhau;
    	$khachhang->kh_gioiTinh = $req->rdoGioitinh;
    	$khachhang->kh_email = $req->txtEmmail;
    	$khachhang->kh_ngaySinh = $req->txtNgaysinh;
        $khachhang->kh_diaChi = $req->txtDiachi;
        $khachhang->kh_dienThoai = $req->txtDienthoai;
 
    	$khachhang->save();

    	return redirect('admin/khachhang/them')->with('thongbao','Thêm thành công');
    }	
}
