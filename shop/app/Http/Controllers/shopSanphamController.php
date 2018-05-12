<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_chude;
use App\shop_loai;
use App\shop_mauchudao;
use App\shop_sanpham;
class shopSanphamController extends Controller
{
    public function getDanhsach(){
    	$sanpham = shop_sanpham::all();
    	return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }
    public function getSua($id){
    	$chude = shop_chude::all();
        $loai = shop_loai::all();
        $mauchudao = shop_mauchudao::all();
        $sanpham = shop_sanpham::find($id);

    	return view('admin.sanpham.sua',['sanpham'=>$sanpham,'chude'=>$chude,'loai'=>$loai,'mauchudao'=>$mauchudao]);
    }
    public function postSua(Request $req ,$id){
    	$sanpham = shop_sanpham::find($id);
    	$this->validate($req,
    		[
    			'txtTen' => 'required:shop_sanpham,sp_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên nhân viên',
    			
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);

    	$sanpham->sp_ten = $req->txtTen;
    //    $sanpham->sp_hinhAnh = $req->fHinh;
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
            unlink("upload/sanpham/".$sanpham->sp_hinhAnh);
            $sanpham->sp_hinhAnh = $fHinh;
           
        }
    	$sanpham->save();

    	return redirect('admin/sanpham/sua/'.$id)->with('thongbao','sửa thành công');  
    }

    public function getXoa($cd){
    	$sanpham = shop_sanpham::find($cd);
    	$sanpham->Delete();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }



    public function getThem(){
    	$chude = shop_chude::all();
    	$loai = shop_loai::all();
    	$mauchudao = shop_mauchudao::all();
    	return view('admin.sanpham.them',['chude'=>$chude,'loai'=>$loai,'mauchudao'=>$mauchudao]);
    }

    public function postThem(Request $req){
    	$this->validate($req,
    		[
    			'txtTen' => 'required|unique:shop_sanpham,sp_ten|min:3|max:100'
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
    //    $sanpham->sp_hinhAnh = $req->fHinh;
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
