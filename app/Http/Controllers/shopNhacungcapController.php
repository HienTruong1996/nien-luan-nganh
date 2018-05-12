<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_nhacungcap;

class shopNhacungcapController extends Controller
{
    public function getDanhsach(){
    	$nhacungcap = shop_nhacungcap::all();
    	return view('admin.nhacungcap.danhsach',['nhacungcap'=>$nhacungcap]);
    }
    public function getSua($id){
    	$nhacungcap = shop_nhacungcap::find($id);
    	return view('admin.nhacungcap.sua',['nhacungcap'=>$nhacungcap]);
    }
    public function postSua(Request $req ,$id){
    	$nhacungcap = shop_nhacungcap::find($id);
    	$this->validate($req,
    		[
    			'txtTen' =>'required|unique:shop_nhacungcap,ncc_ten|min:3|max:100',
                'txtDiachi' =>'required:shop_nhacungcap,ncc_diaChi|min:3|max:100',
                'txtDienthoai' =>'required:shop_nhacungcap,ncc_dienThoai|min:9|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên nhà cung cấp',
                'txtDiachi.required'=>'nhập địa chỉ nhà cung cấp',
                'txtDienthoai.required'=>'nhập điện thoại nhà cung cấp',
    			'txtTen.unique'=>'Tên bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);

    	$nhacungcap->ncc_ten = $req->txtTen;
        $nhacungcap->ncc_diaChi = $req->txtDiachi;
        $nhacungcap->ncc_dienThoai = $req->txtDienthoai;

    	$nhacungcap->save();

    	return redirect('admin/nhacungcap/sua/'.$id)->with('thongbao','sửa thành công');  
    }

    public function getXoa($id){
    	$nhacungcap = shop_nhacungcap::find($id);
    	$nhacungcap->Delete();
    	return redirect('admin/nhacungcap/danhsach')->with('thongbao','Xóa thành công');
    }



    public function getThem(){
    	return view('admin.nhacungcap.them');
    }
    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_nhacungcap,ncc_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'Bạn chưa nhập tên nhà cung cấp',
    			'txtTen.unique'=>'Tên bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);
    	$nhacungcap = new shop_nhacungcap;
    	$nhacungcap->ncc_ten = $req->txtTen;
    	$nhacungcap->ncc_diaChi = $req->txtDiachi;
        $nhacungcap->ncc_dienThoai = $req->txtDienthoai;
 
    	$nhacungcap->save();

    	return redirect('admin/nhacungcap/them')->with('thongbao','Thêm thành công');
    }
}
