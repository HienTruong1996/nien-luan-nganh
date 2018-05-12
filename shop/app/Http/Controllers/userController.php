<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class userController extends Controller
{
  public function getDanhsach(){
    	$user = user::all();
    	return view('admin.users.danhsach',['user'=>$user]);
    } 
    public function getXoa1($cd){
    	$user = user::find($cd);
    	$user->Delete();
    	return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    } 
}
