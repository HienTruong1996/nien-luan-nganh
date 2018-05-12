<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_mauchudao;

class shopMauchudaoController extends Controller
{
    public function getDanhsach(){
    	$mauchudao = shop_mauchudao::all();
    	return view('admin.mauchudao.danhsach',['mauchudao'=>$mauchudao]);
    }
    public function getSua($mcd_ma){
    	$mauchudao = shop_mauchudao::find($mcd_ma);
    	return view('admin.mauchudao.sua',['mauchudao'=>$mauchudao]);
    }
    public function postSua(Request $req ,$mcd_ma){
    	$mauchudao = shop_mauchudao::find($mcd_ma);
    	$this->validate($req,
    		[
    			'txtTen' => 'required:shop_mauchudao,mcd_ten|min:1|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên chủ đề',
    			
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);

    	$mauchudao->mcd_ten = $req->txtTen;
        $mauchudao->mcd_trangThai = $req->rdoTrangthai;

    	$mauchudao->save();

    	return redirect('admin/mauchudao/sua/'.$mcd_ma)->with('thongbao','sửa thành công');  
    }

    public function getXoa($mcd){
    	$mauchudao = shop_mauchudao::find($mcd);
    	$mauchudao->Delete();
    	return redirect('admin/mauchudao/danhsach')->with('thongbao','Xóa thành công');
    }



    public function getThem(){
    	return view('admin.mauchudao.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_mauchudao,mcd_ten|min:1|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên chủ đề',
    			'txtTen.unique'=>'chủ đề bị trùng',
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);
    	$mauchudao = new shop_mauchudao;
    	$mauchudao->mcd_ten = $req->txtTen;
    	$mauchudao->mcd_trangThai = $req->rdoTrangthai;
 
    	$mauchudao->save();

    	return redirect('admin/mauchudao/them')->with('thongbao','Thêm thành công');
    }
}
