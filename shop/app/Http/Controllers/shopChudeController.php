<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_chude;

class shopChudeController extends Controller
{
    public function getDanhsach(){
    	$chude = shop_chude::all();
    	return view('admin.chude.danhsach',['chude'=>$chude]);
    }
    public function getSua($cd_ma){
    	$chude = shop_chude::find($cd_ma);
    	return view('admin.chude.sua',['chude'=>$chude]);
    }
    public function postSua(Request $req ,$cd_ma){
    	$chude = shop_chude::find($cd_ma);
    	$this->validate($req,
    		[
    			'txtTen' => 'required:shop_chude,cd_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên chủ đề',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);

    	$chude->cd_ten = $req->txtTen;
        $chude->cd_trangThai = $req->rdoTrangthai;

    	$chude->save();

    	return redirect('admin/chude/sua/'.$cd_ma)->with('thongbao','sửa thành công');  
    }

    public function getXoa($cd){
    	$chude = shop_chude::find($cd);
    	$chude->Delete();
    	return redirect('admin/chude/danhsach')->with('thongbao','Xóa thành công');
    }



    public function getThem(){
    	return view('admin.chude.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_chude,cd_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên chủ đề',
    			'txtTen.unique'=>'chủ đề bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);
    	$chude = new shop_chude;
    	$chude->cd_ten = $req->txtTen;
    	$chude->cd_trangThai = $req->rdoTrangthai;
 
    	$chude->save();

    	return redirect('admin/chude/them')->with('thongbao','Thêm thành công');
    }
}
