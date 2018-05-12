<?php

namespace App\Http\Controllers;

use App\shop_chitietdonhang;
use App\shop_donhang;
use App\shop_lohang;
use Cart;
use App\shop_sanpham;
use Illuminate\Http\Request;
use App\shop_chude;
use App\shop_mauchudao;
use App\shop_loai;
use App\shop_slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class CartController extends Controller
{
    function cart(Request $req)
    {
        Cart::add($req->id,$req->name,1,$req->price);
        return redirect('giohang')->with('thongbao','Thêm Thành Công');
    }
    function destroy()
    {
        Cart::destroy();
    }

    function delete($ma)
    {
        Cart::remove($ma);
        return redirect('giohang')->with('thongbao','Xóa Thành Công');
    }

    function __construct()
    {
        $slider = shop_slider::all();
        $chude = shop_chude::all();
        $sanpham = shop_sanpham::all();
        $mauchudao = shop_mauchudao::all();
        $loai = shop_loai::all();
        view()->share('slider',$slider);
        view()->share('chude',$chude);
        view()->share('sanpham',$sanpham);
        view()->share('mauchudao',$mauchudao);
        view()->share('loai',$loai);
    }
    function postThanhtoan(Request $req)
    {
        $donhang = new shop_donhang();
        foreach (Cart::content() as $item)
        {

            $lohang1=  DB::table('shop_lohang')->where('sp_ma',$item->id)->first();
            if(($lohang1->lh_soLuongNhap - $lohang1->lh_soLuongDaBan ) >= $item->qty)
            {
                $this->validate($req,
                    [
                        'txtNguoinhan' => 'required:shop_donhang,dh_nguoiNhan|min:3|max:100'
                    ],
                    [
                        'txtNguoinhan.required' => 'bạn chưa nhập tên người nhận',

                        'txtNguoinhan' => 'Tên quá ngắn',
                        'txtNguoinhan' => 'Tên quá dài'
                    ]
                );

                $donhang->dh_nguoiNhan = $req->txtNguoinhan;
                $donhang->dh_dienThoai = $req->txtDienthoai;
                $donhang->dh_diaChi = $req->txtDiachi;
                $donhang->dh_nguoiGui = Auth::user()->name;

                $b = str_replace( ',', '',Cart::total()  );


                $donhang->dh_tongTien = $b;

                $donhang->dh_trangThai = 2;
                $donhang->kh_ma = 2;

                $donhang->save();



                    $chitietdonhang = new shop_chitietdonhang();
                    $chitietdonhang->ctdh_soLuong = $item->qty;
                    $chitietdonhang->ctdh_donGia = $item->price;
                    $chitietdonhang->sp_ma = $item->id;
                    $chitietdonhang->dh_ma = $donhang->dh_ma;
                    $chitietdonhang->save();

                    $lohang =  shop_lohang::find($lohang1->lh_ma);

                    $lohang->lh_giaMuaVao = $lohang1->lh_giaMuaVao;
                    $lohang->lh_giaBanRa = $lohang1->lh_giaBanRa;
                    $lohang->lh_soLuongNhap = $lohang1->lh_soLuongNhap;
                    $daban = $lohang1->lh_soLuongDaBan + $item->qty ;
                    $lohang->lh_soLuongDaBan = $daban;
                    $lohang->lh_trangThai = $lohang1->lh_trangThai;
                    $lohang->ncc_ma = $lohang1->ncc_ma;
                    $lohang->sp_ma = $lohang1->sp_ma;
                    $lohang->save();
                    Cart::destroy();




            }
            else
                return redirect('giohang')->with('thongbao','Sản Phẩm Đã Hết Hàng');
         }
        return view('Pages.thanhtoan');
    }


}
