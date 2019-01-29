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
Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provide}/callback', 'SocialAuthController@handleProviderCallback');


Route::get('LoginGoogle', 'PagesController@LoginGoogle');

Route::group(['prefix'=>'admin', 'middleware'=>'dashboard'], function(){

	Route::group(['prefix'=>'loaisanpham', 'middleware'=>'loaisukien'], function(){

		Route::get('danhsach', 'loaisukienController@getDanhSach');

		Route::get('them', 'loaisukienController@getThem');
		Route::post('them', 'loaisukienController@postThem');

		Route::get('sua/{id}', 'loaisukienController@getSua');
		Route::post('sua/{id}', 'loaisukienController@postSua');

		Route::get('xoa/{id}', 'loaisukienController@getXoa');
	});

	Route::group(['prefix'=>'nhomsanpham'], function(){

		Route::get('danhsach', 'nhomsanphamController@getDanhSach');

		Route::get('them', 'nhomsanphamController@getThem');
		Route::post('them', 'nhomsanphamController@postThem');

		Route::get('sua/{id}', 'nhomsanphamController@getSua');
		Route::post('sua/{id}', 'nhomsanphamController@postSua');

		Route::get('xoa/{id}', 'nhomsanphamController@getXoa');
	});

	Route::group(['prefix'=>'lienhe'], function(){

		Route::get('danhsach', 'lienheController@getDanhSach');

		// Route::get('them', 'lienheController@getThem');
		// Route::post('them', 'lienheController@postThem');

		Route::get('sua/{id}', 'lienheController@getSua');
		Route::post('sua/{id}', 'lienheController@postSua');

		Route::get('xoa/{id}', 'lienheController@getXoa');
	});

	Route::group(['prefix'=>'sanpham', 'middleware'=>'sukien'], function(){

		Route::get('danhsach', 'sukienController@getDanhSach');

		Route::get('them', 'sukienController@getThem');
		Route::post('them', 'sukienController@postThem');

		Route::get('sua/{id}', 'sukienController@getSua');
		Route::post('sua/{id}', 'sukienController@postSua');

		Route::get('xoa/{id}', 'sukienController@getXoa');
	});

	Route::group(['prefix'=>'trangcon', 'middleware'=>'sukien'], function(){

		Route::get('danhsach', 'trangconController@getDanhSach');

		Route::get('them', 'trangconController@getThem');
		Route::post('them', 'trangconController@postThem');

		Route::get('sua/{id}', 'trangconController@getSua');
		Route::post('sua/{id}', 'trangconController@postSua');

		Route::get('xoa/{id}', 'trangconController@getXoa');
	});

	Route::group(['prefix'=>'slide', 'middleware'=>'slide'], function(){

		Route::get('danhsach', 'slideController@getDanhSach');

		Route::get('them', 'slideController@getThem');
		Route::post('them', 'slideController@postThem');

		Route::get('sua/{id}', 'slideController@getSua');
		Route::post('sua/{id}', 'slideController@postSua');

		Route::get('xoa/{id}', 'slideController@getXoa');
	});


	Route::group(['prefix'=>'comment', 'middleware'=>'comment'], function(){

		Route::get('xoa/{id}/{id_sukien}', 'commentController@getXoa');
	});

	Route::group(['prefix'=>'user', 'middleware'=>'user'], function(){

		Route::get('danhsach', 'userController@getDanhSach');

		Route::get('them', 'userController@getThem');
		Route::post('them', 'userController@postThem');

		Route::get('sua/{id}', 'userController@getSua');
		Route::post('sua/{id}', 'userController@postSua');

		Route::get('xoa/{id}', 'userController@getXoa');
	});

	Route::group(['prefix'=>'bantochuc', 'middleware'=>'bantochuc'], function(){

		Route::get('them/{id}', 'bantochucController@getThem');
		Route::post('them/{id}', 'bantochucController@postThem');

		Route::get('sua/{id}/{id_sukien}', 'bantochucController@getSua');
		Route::post('sua/{id}/{id_sukien}', 'bantochucController@postSua');

		Route::get('xoa/{id}/{id_sukien}', 'bantochucController@getXoa');
	});


	Route::group(['prefix'=>'ajax'], function(){

		Route::get('loaisukien/{id_theloai}', 'ajaxController@getLoaisukien');

		Route::get('setgrouprole/{id_group}/{id_role}', 'ajaxController@setGrouprole');

		Route::get('deletegrouprole/{id_group}/{id_role}', 'ajaxController@deleteGrouprole');

	});

	Route::group(['prefix'=>'group', 'middleware'=>'group'], function(){

		Route::get('danhsach', 'groupController@getDanhSach');

		Route::get('them', 'groupController@getThem');
		Route::post('them', 'groupController@postThem');

		Route::get('sua/{id}', 'groupController@getSua');
		Route::post('sua/{id}', 'groupController@postSua');

		Route::get('xoa/{id}', 'groupController@getXoa');
	});

	Route::group(['prefix'=>'role', 'middleware'=>'role'], function(){

		Route::get('danhsach', 'roleController@getDanhSach');

		Route::get('them', 'roleController@getThem');
		Route::post('them', 'roleController@postThem');

		Route::get('sua/{id}', 'roleController@getSua');
		Route::post('sua/{id}', 'roleController@postSua');

		Route::get('xoa/{id}', 'roleController@getXoa');
	});

	Route::get('dashboard', function(){
		return view('admin.dashboard');
	});

});


Route::get('/','PagesController@getIndex');
Route::get('sanpham/{id}/{slug}.html','PagesController@sukien');
Route::get('loaisanpham/{id}/{slug}.html','PagesController@loaisukien');
Route::get('nhomsanpham/{id}/{slug}.html','PagesController@nhomsanpham');


Route::get('admin/dangnhap','userController@getDangnhapAdmin');
Route::post('admin/dangnhap','userController@postDangnhapAdmin');

Route::get('admin/logout', 'userController@getDangxuatAdmin');


Route::get('dangnhap','PagesController@getDangnhap');
Route::post('dangnhap','PagesController@postDangnhap');
Route::get('dangxuat','PagesController@getDangxuat');

Route::get('nguoidung','PagesController@getNguoidung');
Route::post('nguoidung','PagesController@postNguoidung');

Route::get('dangki','PagesController@getDangki');
Route::post('dangki','PagesController@postDangki');

Route::post('timkiem','PagesController@Timkiem');

Route::get('lienhe','PagesController@getLienhe');
Route::post('lienhe','PagesController@postLienhe');

Route::post('comment/{id}','commentController@postComment');

Route::get('/{slug}_{id}.html','PagesController@trangcon');