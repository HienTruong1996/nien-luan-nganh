<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_quyen;

class shopQuyenController extends Controller
{
    public function getDanhsach(){
    	$quyen = shop_quyen::all();
    	return view('admin.quyen.danhsach',['quyen'=>$quyen]);
    }
    public function getSua($id){
    	$quyen = shop_quyen::find($id);
    	return view('admin.quyen.sua',['quyen'=>$quyen]);
    }
    public function postSua(Request $req ,$id){
    	$quyen = shop_quyen::find($id);
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_quyen,q_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên chủ đề',
    			'txtTen.unique'=>'chủ đề bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);

    	$quyen->q_ten = $req->txtTen;
        $quyen->q_trangThai = $req->rdoTrangthai;

    	$quyen->save();

    	return redirect('admin/quyen/sua/'.$id)->with('thongbao','sửa thành công');  
    }

    public function getXoa($q){
    	$quyen = shop_quyen::find($q);
    	$quyen->Delete();
    	return redirect('admin/quyen/danhsach')->with('thongbao','Xóa thành công');
    }



    public function getThem(){
    	return view('admin.quyen.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_quyen,q_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên chủ đề',
    			'txtTen.unique'=>'chủ đề bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);
    	$quyen = new shop_quyen;
    	$quyen->q_ten = $req->txtTen;
    	$quyen->q_trangThai = $req->rdoTrangthai;
 
    	$quyen->save();

    	return redirect('admin/quyen/them')->with('thongbao','Thêm thành công');
    }
}
