<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_loai;

class shopLoaiController extends Controller
{
     public function getDanhsach(){
    	$loai = shop_loai::all();
    	return view('admin.loai.danhsach',['loai'=>$loai]);
    }
    public function getSua($id){
    	$loai = shop_loai::find($id);
    	return view('admin.loai.sua',['loai'=>$loai]);
    }
    public function postSua(Request $req ,$id){
    	$loai = shop_loai::find($id);
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_loai,l_ten|min:2|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên loai',
    			'txtTen.unique'=>'Loại bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);

    	$loai->l_ten = $req->txtTen;
        $loai->l_trangThai = $req->rdoTrangthai;

    	$loai->save();

    	return redirect('admin/loai/sua/'.$id)->with('thongbao','sửa thành công');  
    }

    public function getXoa($cd){
    	$loai = shop_loai::find($cd);
    	$loai->Delete();
    	return redirect('admin/loai/danhsach')->with('thongbao','Xóa thành công');
    }



    public function getThem(){
    	return view('admin.loai.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'txtTen' => 'required:shop_loai,l_ten|min:2|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên chủ đề',
    			
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);
    	$loai = new shop_loai;
    	$loai->l_ten = $req->txtTen;
    	$loai->l_trangThai = $req->rdoTrangthai;
 
    	$loai->save();

    	return redirect('admin/loai/them')->with('thongbao','Thêm thành công');
    }
}
