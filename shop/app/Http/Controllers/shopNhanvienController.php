<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_nhanvien;
use App\shop_quyen;
use App\User;

class shopNhanvienController extends Controller
{
    public function getDanhsach(){
    	$nhanvien = shop_nhanvien::all();
    	return view('admin.nhanvien.danhsach',['nhanvien'=>$nhanvien]);
    }
    public function getSua($id){
    	$quyen = shop_quyen::all();
    	$nhanvien = shop_nhanvien::find($id);

    	return view('admin.nhanvien.sua',['nhanvien'=>$nhanvien,'quyen'=>$quyen]);
    }
    public function postSua(Request $req ,$id){
    	$nhanvien = shop_nhanvien::find($id);
    	$this->validate($req,
    		[
    			'txtTen' => 'required:shop_nhanvien,nv_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên nhân viên',
    			
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);

    	$nhanvien->nv_ten = $req->txtTen;
    	$nhanvien->nv_gioiTinh = $req->rdoGioitinh;
    	$nhanvien->nv_email = $req->txtEmmail;
    	$nhanvien->nv_ngaySinh = $req->txtNgaysinh;
        $nhanvien->nv_diaChi = $req->txtDiachi;
        $nhanvien->nv_dienThoai = $req->txtDienthoai;


    	$nhanvien->save();

    	return redirect('admin/nhanvien/sua/'.$id)->with('thongbao','sửa thành công');  
    }

    public function getXoa($cd){
    	$nhanvien = shop_nhanvien::find($cd);
    	$nhanvien->Delete();
    	return redirect('admin/nhanvien/danhsach')->with('thongbao','Xóa thành công');
    }



    public function getThem(){
    	$quyen = shop_quyen::all();
    	return view('admin.nhanvien.them',['quyen'=>$quyen]);
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_nhanvien,nv_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên chủ đề',
    			'txtTen.unique'=>'chủ đề bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);
    	$nhanvien = new shop_nhanvien;
    	$nhanvien->nv_ten = $req->txtTen;
    	$nhanvien->nv_gioiTinh = $req->rdoGioitinh;
    	$nhanvien->nv_email = $req->txtEmmail;
    	$nhanvien->nv_ngaySinh = $req->txtNgaysinh;
        $nhanvien->nv_diaChi = $req->txtDiachi;
        $nhanvien->nv_dienThoai = $req->txtDienthoai;

 
    	$nhanvien->save();

    	return redirect('admin/nhanvien/them')->with('thongbao','Thêm thành công');
    }
//user
    public function getThemtaikhoan($id){
        $nhanvien = shop_nhanvien::find($id);
        $quyen = shop_quyen::all();
        return view('admin.nhanvien.themtaikhoan',['nhanvien'=>$nhanvien,'quyen'=>$quyen]);
    }
    public function postThemtaikhoan(Request $req ,$id){
        $nhanvien = shop_nhanvien::find($id);
        $this->validate($req,
            [
                'txtTen' => 'required:shop_nhanvien,nv_ten|min:3|max:100'
            ],
            [
                'txtTen.required'=>'bạn chưa nhập tên nhân viên',
                
                'txtTen.min'=>'Tên quá ngắn',
                'txtTen.max'=>'Tên quá dài'
            ]
        );

        $user = new user;
        $user->name = $req->txtTen;
        $user->email = $req->txtEmmail;
        $user->password = bcrypt($req->txtPass);
        $user->q_ma = $req->rdoQ;
        $user->nv_ma = $req->txtnvma;

 
        $user->save();

        return redirect('admin/nhanvien/themtaikhoan/'.$id)->with('thongbao','thêm thành công');  
    }
    public function getDanhsachUsers(){
        $users = users::all();
        return view('admin.nhanvien.danhsachUsers',['users'=>$users]);
    }
    
}
