<?php

namespace App\Http\Controllers;

use App\shop_nhacungcap;
use App\shop_sanpham;
use Illuminate\Http\Request;
use App\shop_lohang;

class shopLohangController extends Controller
{

    public function getSua($id)
    {
        $sanpham = shop_sanpham::all();
        $nhacungcap = shop_nhacungcap::all();
        $lohang = shop_lohang::find($id);
        return view('admin.lohang.sua', ['lohang' => $lohang, 'nhacungcap' => $nhacungcap, 'sanpham' => $sanpham]);
    }



    public function getXoa($ma)
    {
        $lohang = shop_lohang::find($ma);
        $lohang->Delete();
        return redirect('admin/lohang/danhsach')->with('thongbao', 'Xóa thành công');
    }


    public function getThem()
    {
        $sanpham = shop_sanpham::all();
        $nhacungcap = shop_nhacungcap::all();
        return view('admin.lohang.them', ['nhacungcap' => $nhacungcap, 'sanpham' => $sanpham]);
    }

    public function postThem(Request $req)
    {
        $this->validate($req,
            [
                'txtGiamuavao' => 'required:shop_lohang,lh_giaMuaVao|min:3|max:100'
            ],
            [
                'txtGiamuavao.required' => 'bạn chưa nhập giá mua vào',
                'txtGiamuavao.min' => 'Tên quá ngắn',
                'txtGiamuavao.max' => 'Tên quá dài'
            ]
        );
        $lohang = new shop_lohang;
        $lohang->lh_giaMuaVao = $req->txtGiamuavao;
        $lohang->lh_giaBanRa = $req->txtGiabanra;
        $lohang->lh_soLuongNhap = $req->txtSoluongnhap;
        $lohang->lh_soLuongDaBan = $req->txtSoluongdaban;
        $lohang->lh_trangThai = $req->rdoStatus;
        $lohang->ncc_ma = $req->cbL;
        $lohang->sp_ma = $req->spx;
        $lohang->save();

        return redirect('admin/lohang/them')->with('thongbao', 'Thêm thành công');
    }

    public function getDanhsach()
    {
        $lohang = shop_lohang::all();
        return view('admin.lohang.danhsach', ['lohang' => $lohang]);
    }

    public function postSua(Request $req,$ma)
    {
        $lohang = shop_lohang::find($ma);
        $this->validate($req,
            [
                'txtGiamuavao' => 'required:shop_lohang,lh_giaMuaVao|min:3|max:100'
            ],
            [
                'txtGiamuavao.required' => 'bạn chưa nhập tên chủ đề',

                'txtGiamuavao.min' => 'Tên quá ngắn',
                'txtGiamuavao.max' => 'Tên quá dài'
            ]
        );

        $lohang->lh_giaMuaVao = $req->txtGiamuavao;
        $lohang->lh_giaBanRa = $req->txtGiabanra;
        $lohang->lh_soLuongNhap = $req->txtSoluongnhap;
        $lohang->lh_soLuongDaBan = $req->txtSoluongdaban;
        $lohang->lh_trangThai = $req->rdoStatus;
        $lohang->ncc_ma = $req->cbL;
        $lohang->sp_ma = $req->spx;
        $lohang->save();

        return redirect('admin/lohang/sua/'.$ma)->with('thongbao', 'Sửa thành công');
    }
}