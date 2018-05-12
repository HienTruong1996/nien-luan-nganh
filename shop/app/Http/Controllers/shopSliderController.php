<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop_slider;

class shopSliderController extends Controller
{
    public function getDanhsach(){
    	$slider = shop_slider::all();
    	return view('admin.slider.danhsach',['slider'=>$slider]);
    }
    public function getSua($id){
        $slider = shop_slider::find($id);

    	return view('admin.slider.sua',['slider'=>$slider]);
    }
    public function postSua(Request $req ,$id){
    	$slider = shop_slider::find($id);
    	$this->validate($req,
    		[
    			'txtTen' => 'required:shop_slider,sli_ten|min:3|max:100'
    		],
    		[
    			'txtTen.required'=>'bạn chưa nhập tên nhân viên',
    			
    			'txtTen.min'=>'Tên quá ngắn',
    			'txtTen.max'=>'Tên quá dài'
    		]
    	);

    	$slider->sli_ten = $req->txtTen;

    //    $slider->sli_hinhAnh = $req->fHinh;
        $slider->sli_moTa = $req->txtmoTa;
        $slider->sli_loai = $req->rdoTrangthai;
        
        
        if($req->hasFile('fHinh'))
        {
            $file = $req->file('fHinh');
            $name = $file->getClientOriginalName();
            $fHinh = str_random(4)."_".$name;
            while (file_exists("upload/slider/".$fHinh)) {
                $fHinh = str_random(4)."_".$name;
            }
            $file->move("upload/slider",$fHinh);
            unlink("upload/slider/".$slider->sli_hinhAnh);
            $slider->sli_hinhAnh = $fHinh;
           
        }
    	$slider->save();

    	return redirect('admin/slider/sua/'.$id)->with('thongbao','sửa thành công');  
    }

    public function getXoa($cd){
    	$slider = shop_slider::find($cd);
    	$slider->Delete();
    	return redirect('admin/slider/danhsach')->with('thongbao','Xóa thành công');
    }



    public function getThem(){
    	return view('admin.slider.them');
    }

    public function postThem(Request $req){
       
        $this->validate($req,
            [
                'txtTen' => 'required:shop_slider,sli_ten|min:3|max:100'
            ],
            [
                'txtTen.required'=>'bạn chưa nhập tên nhân viên',
                
                'txtTen.min'=>'Tên quá ngắn',
                'txtTen.max'=>'Tên quá dài'
            ]
        );
        $slider = new shop_slider;
        $slider->sli_ten = $req->txtTen;
    //    $slider->sli_hinhAnh = $req->fHinh;
        $slider->sli_moTa = $req->txtmoTa;
        $slider->sli_loai = $req->rdoTrangthai;
        
        if($req->hasFile('fHinh'))
        {
            $file = $req->file('fHinh');
            $name = $file->getClientOriginalName();
            $fHinh = str_random(4)."_".$name;
            while (file_exists("upload/slider/".$fHinh)) {
                $fHinh = str_random(4)."_".$name;
            }
            $file->move("upload/slider",$fHinh);

            $slider->sli_hinhAnh = $fHinh;
           
        }
        else
        {
            $slider->sli_hinhAnh = "";  
        }
        $slider->save();

        return redirect('admin/slider/them')->with('thongbao','thêm thành công');  
    }
}
