<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_donhang;
use App\shop_khachhang;
class shopDonhangController extends Controller
{
    public function getDanhsach(){
    	$donhang = shop_donhang::all();
    	return view('admin.donhang.danhsach',['donhang'=>$donhang]);
    }
    public function getSua($dh_ma){
    	$donhang = shop_donhang::find($dh_ma);
    	$khachhang = shop_khachhang::all();
    	return view('admin.donhang.sua',['donhang'=>$donhang],['khachhang'=>$khachhang]);
    }
    public function postSua(Request $req ,$dh_ma){
    	$donhang = shop_donhang::find($dh_ma);
    	$this->validate($req,
    		[
    			'txtNguoinhan' => 'required:shop_donhang,dh_Nguoinhan|max:100'
    		],
    		[
    			'txtNguoinhan.required'=>'bạn chưa nhập tên người nhận',
    			'txtNguoinhan.max'=>'Tên quá dài'
    		]
    	);

    	$donhang->dh_nguoiNhan = $req->txtNguoinhan;
        $donhang->dh_dienThoai = $req->txtDienthoai;
        $donhang->dh_nguoiGui = $req->txtNguoigui;
        $donhang->dh_tongTien = $req->txtTongtien;
        $donhang->dh_trangThai = $req->rdoTrangthai;
        $donhang->kh_ma = $req->cdKH;

    	$donhang->save();

    	return redirect('admin/donhang/sua/'.$dh_ma)->with('thongbao','sửa thành công');  
    }

    public function getXoa($dh){
    	$donhang = shop_donhang::find($dh);
    	$donhang->Delete();
    	return redirect('admin/donhang/danhsach')->with('thongbao','Xóa thành công');
    }
    public function postDuyet(Request $req,$dh_ma)
    {
        $donhang1 = shop_donhang::find($dh_ma);

        $donhang = shop_donhang::find($dh_ma);
        $donhang->dh_nguoiNhan =$donhang1->dh_nguoiNhan;
        $donhang->dh_dienThoai = $donhang1->dh_dienThoai;
        $donhang->dh_nguoiGui = $donhang1->dh_nguoiGui;
        $donhang->dh_tongTien = $donhang1->dh_tongTien;
        if($donhang1->dh_trangThai == 2)
            $donhang->dh_trangThai = 1;
        else
            $donhang->dh_trangThai = 2;
        $donhang->kh_ma =$donhang1->kh_ma ;

        $donhang->save();



        return redirect('admin/donhang/duyet/'.$dh_ma)->with('thongbao','Duyệt thành công');
    }
    public function getDuyet($ma){
        $donhang = shop_donhang::find($ma);
        return view('admin.donhang.duyet',['donhang'=>$donhang]);
    }


}
