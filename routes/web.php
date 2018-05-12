<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\shop_chude;
Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/dangnhap','DangnhapController@getDangnhapAdmin');
Route::post('admin/dangnhap','DangnhapController@postDangnhapAdmin');
Route::get('admin/dangxuat','DangnhapController@getDangxuatAdmin');



Route::get('trangchu','PagesController@trangchu');
Route::get('chitiet/{sp_ma}','PagesController@chitiet');

Route::get('cart','CartController@cart');
Route::post('cart','CartController@cart');
Route::get('empty','CartController@destroy');
Route::get('delete/{ma}','CartController@delete');

route::get('sanphamtheo_chude/{ma}','PagesController@chude');
route::get('sanphamtheo_mau/{ma}','PagesController@mau');
route::get('sanphamtheo_loai/{ma}','PagesController@loai');
route::get('lienhe','PagesController@lienhe');
route::get('dieukhoan','PagesController@dieukhoan');
route::get('khuyenmai','PagesController@khuyenmai');
route::get('giohang','PagesController@giohang');


Route::get('dangnhap','PagesController@getDangnhap');
Route::post('dangnhap','PagesController@postDangnhap');
Route::get('dangxuat','PagesController@getDangxuat');


Route::post('dangky','PagesController@postDangky');

Route::post('thanhtoan','CartController@postThanhtoan');





Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

    route::get('trangchu','TrangchuController@trangchuadmin');
    Route::group(['prefix'=>'chude'],function(){
		Route::get('danhsach','shopChudeController@getDanhSach');

		Route::get('sua/{cd_ma}','shopChudeController@getSua');
		Route::post('sua/{cd_ma}','shopChudeController@postSua');

		Route::get('them','shopChudeController@getThem');
		route::post('them','shopChudeController@postThem');
		
		route::get('xoa/{cd_ma}','shopChudeController@getXoa');



	});


    Route::group(['prefix'=>'khuyenmai'],function(){
        Route::get('danhsach','shopKhuyenmaiController@getDanhSach');

        Route::get('sua/{cd_ma}','shopKhuyenmaiController@getSua');
        Route::post('sua/{cd_ma}','shopKhuyenmaiController@postSua');

        Route::get('them','shopKhuyenmaiController@getThem');
        route::post('them','shopKhuyenmaiController@postThem');

        route::get('xoa/{cd_ma}','shopKhuyenmaiController@getXoa');



    });

    Route::group(['prefix'=>'lohang'],function(){
        Route::get('danhsach','shopLohangController@getDanhSach');

        Route::get('sua/{lh_ma}','shopLohangController@getSua');
        Route::post('sua/{lh_ma}','shopLohangController@postSua');

        Route::get('them','shopLohangController@getThem');
        route::post('them','shopLohangController@postThem');

        route::get('xoa/{lh_ma}','shopLohangController@getXoa');



    });

	Route::group(['prefix'=>'slider'],function(){
		Route::get('danhsach','shopSliderController@getDanhSach');

		Route::get('sua/{sli_ma}','shopSliderController@getSua');
		Route::post('sua/{sli_ma}','shopSliderController@postSua');

		Route::get('them','shopSliderController@getThem');
		route::post('them','shopSliderController@postThem');
		
		route::get('xoa/{sli_ma}','shopSliderController@getXoa');



	});

	Route::group(['prefix'=>'chitietdonhang','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopChitietdonhangController@getDanhSach');


		Route::get('sua/{ctdh_ma}','shopChitietdonhangController@getSua');
		Route::post('sua/{ctdh_ma}','shopChitietdonhang@postSua');

		Route::get('them','shopChitietdonhangController@getThem');
		route::post('them','shopChitietdonhangController@postThem');

		route::get('xoa/{ctdh_ma}','shopChitietdonhangController@getXoa');

	});

	Route::group(['prefix'=>'donhang','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopDonhangController@getDanhSach');

		Route::get('sua/{dh_ma}','shopDonhangController@getSua');
		Route::post('sua/{dh_ma}','shopDonhangController@postSua');

		Route::get('them','shopDonhangController@getThem');
		route::post('them','shopDonhangController@postThem');

		route::get('xoa/{dh_ma}','shopDonhangController@getXoa');
        route::get('duyet/{dh_ma}','shopDonhangController@getDuyet');
        route::post('duyet/{dh_ma}','shopDonhangController@postDuyet');




	});

	Route::group(['prefix'=>'hinhanhsanpham','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopHinhanhsanphamController@getDanhSach');

		Route::get('sua/{hasp_ma}','shopHinhanhsanphamController@getSua');
		Route::post('sua/{hasp_ma}','shopHinhanhsanphamController@postSua');

		Route::get('them','shopHinhanhsanphamController@getThem');
		route::post('them','shopHinhanhsanphamController@postThem');

		route::get('xoa/{hasp_ma}','shopHinhanhsanphamController@getXoa');
	});

	Route::group(['prefix'=>'khachhang','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopKhachhangController@getDanhSach');

		Route::get('sua/{kh_ma}','shopKhachhangController@getSua');
		Route::post('sua/{kh_ma}','shopKhachhangController@postSua');

		Route::get('them','shopKhachhangController@getThem');
		route::post('them','shopKhachhangController@postThem');

		route::get('xoa/{kh_ma}','shopKhachhangController@getXoa');
	});

	Route::group(['prefix'=>'khuyenmai','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopKhuyenmaiController@getDanhSach');

		Route::get('sua/{km_ma}','shopKhuyenmaiController@getSua');
		Route::post('sua/{km_ma}','shopKhuyenmaiController@postSua');

		Route::get('them','shopKhuyenmaiController@getThem');
		route::post('them','shopKhuyenmaiController@postThem');

		route::get('xoa/{km_ma}','shopKhuyenmaiController@getXoa');


	});

	Route::group(['prefix'=>'loai','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopLoaiController@getDanhSach');

		Route::get('sua/{l_ma}','shopLoaiController@getSua');
		Route::post('sua/{l_ma}','shopLoaiController@postSua');

		Route::get('them','shopLoaiController@getThem');
		route::post('them','shopLoaiController@postThem');

		route::get('xoa/{l_ma}','shopLoaiController@getXoa');
	});

	Route::group(['prefix'=>'lohang','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopLohangController@getDanhSach');

		Route::get('sua/{lh_ma}','shopLohangController@getSua');
		Route::post('sua/{lh_ma}','shopLohangController@postSua');

		Route::get('them','shopLohangController@getThem');
		route::post('them','shopLohangController@postThem');

		route::get('xoa/{lh_ma}','shopLohangController@getXoa');
	});

	Route::group(['prefix'=>'mauchudao','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopMauchudaoController@getDanhSach');

		Route::get('sua/{mcd_ma}','shopMauchudaoController@getSua');
		Route::post('sua/{mcd_ma}','shopMauchudaoController@postSua');

		Route::get('them','shopMauchudaoController@getThem');
		route::post('them','shopMauchudaoController@postThem');

		route::get('xoa/{mcd_ma}','shopMauchudaoController@getXoa');
	});

	Route::group(['prefix'=>'nhacungcap','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopNhacungcapController@getDanhSach');

		Route::get('sua/{ncc_ma}','shopNhacungcapController@getSua');
		Route::post('sua/{ncc_ma}','shopNhacungcapController@postSua');

		Route::get('them','shopNhacungcapController@getThem');
		route::post('them','shopNhacungcapController@postThem');

		route::get('xoa/{ncc_ma}','shopNhacungcapController@getXoa');
	});

	Route::group(['prefix'=>'nhanvien','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopNhanvienController@getDanhSach');

		Route::get('sua/{nv_ma}','shopNhanvienController@getSua');
		Route::post('sua/{nv_ma}','shopNhanvienController@postSua');



		Route::get('them','shopNhanvienController@getThem');
		route::post('them','shopNhanvienController@postThem');


		route::get('xoa/{nv_ma}','shopNhanvienController@getXoa');

		//users
		Route::get('danhsachUsers','shopNhanvienController@getDanhSachUsers');

		Route::get('themtaikhoan/{nv_ma}','shopNhanvienController@getThemtaikhoan');
		Route::post('themtaikhoan/{nv_ma}','shopNhanvienController@postThemtaikhoan');


	});

	Route::group(['prefix'=>'quyen','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopQuyenController@getDanhSach');

		Route::get('sua/{q_ma}','shopQuyenController@getSua');
		Route::post('sua/{q_ma}','shopQuyenController@postSua');

		Route::get('them','shopQuyenController@getThem');
		route::post('them','shopQuyenController@postThem');

		route::get('xoa/{q_ma}','shopQuyenController@getXoa');
	});

	Route::group(['prefix'=>'sanpham','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopSanphamController@getDanhSach');

		Route::get('sua/{sp_ma}','shopSanphamController@getSua');
		Route::post('sua/{sp_ma}','shopSanphamController@postSua');

		Route::get('them','shopSanphamController@getThem');
		route::post('them','shopSanphamController@postThem');

		route::get('xoa/{sp_ma}','shopSanphamController@getXoa');
	});

	Route::group(['prefix'=>'sanphamkhuyenmai','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','shopSanphamkhuyenmaiController@getDanhSach');

		Route::get('sua/{spkm_ma}','shopSanphamkhuyenmaiController@getSua');
		Route::post('sua/{spkm_ma}','shopSanphamkhuyenmaiController@postSua');

		Route::get('them','shopSanphamkhuyenmaiController@getThem');
		route::post('them','shopSanphamkhuyenmaiController@postThem');

		route::get('xoa/{spkm_ma}','shopSanphamkhuyenmaiController@getXoa');
	});
	Route::group(['prefix'=>'user','middleware'=>'adminLogin'],function(){
		Route::get('danhsach','userController@getDanhSach');
		route::get('xoa/{id}','userController@getXoa1');
	});

});