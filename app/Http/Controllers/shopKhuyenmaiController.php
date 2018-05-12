<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_khuyenmai;

class shopKhuyenmaiController extends Controller
{
    public function getDanhsach(){
        $khuyenmai = shop_khuyenmai::all();
        return view('admin.khuyenmai.danhsach',['khuyenmai'=>$khuyenmai]);
    }

    public function getThem(){
        return view('admin.khuyenmai.them');
    }

    public function postThem(Request $req){
        $this->validate($req,
            [
                'txtTen' => 'required|unique:shop_khuyenmai,km_teuDe|min:3|max:100'
            ],
            [
                'txtTen.required'=>'bạn chưa nhập tên chủ đề',
                'txtTen.unique'=>'chủ đề bị trùng',
                'txtTen.min'=>'Tên quá ngắn',
                'txtTen.max'=>'Tên quá dài'
            ]
        );
        $sanpham = new shop_sanpham;
        $sanpham->sp_ten = $req->txtTen;
        $sanpham->sp_moTa = $req->txtmoTa;
        $sanpham->sp_giaGoc = $req->txtgiaGoc;
        $sanpham->sp_giaBan = $req->txtgiaBan;
        $sanpham->sp_trangThai = $req->rdoTrangThai;
        $sanpham->cd_ma = $req->cbCD;
        $sanpham->l_ma = $req->cbL;
        $sanpham->mcd_ma = $req->cbMCD;

        if($req->hasFile('fHinh'))
        {
            $file = $req->file('fHinh');
            $name = $file->getClientOriginalName();
            $fHinh = str_random(4)."_".$name;
            while (file_exists("upload/sanpham/".$fHinh)) {
                $fHinh = str_random(4)."_".$name;
            }
            $file->move("upload/sanpham",$fHinh);

            $sanpham->sp_hinhAnh = $fHinh;

        }
        else
        {
            $sanpham->sp_hinhAnh = "";
        }


        $sanpham->save();

        return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
    }
}
