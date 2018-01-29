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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', function(){
	return redirect('main');
});


Route::get('checking',function(){

	switch(Auth::user()->role_id){
		case '1':
			return redirect('main');
		break;
		default:
			return redirect('/');
		break;
	}

});

// standar route
Route::group(['middleware'=>'web'],function(){
	Route::group(['middleware'=>'userMiddleware:1'],function(){
		Route::get('main','MainController@index');

		Route::get('pelanggan','CustomerController@index');
		Route::group(['prefix'=>'pelanggan'],function(){
			Route::post('delete','CustomerController@delete');
			Route::post('setTechnician','CustomerController@setTechnician');
			Route::post('technicianDetail','CustomerController@technicianDetail');
		});

		Route::get('teknisi','TechnicianController@index');
		Route::group(['prefix'=>'teknisi'],function(){
			Route::get('create','TechnicianController@create');
			Route::post('store','TechnicianController@store');
			Route::get('edit','TechnicianController@edit');
			Route::post('update','TechnicianController@update');
			Route::post('delete','TechnicianController@delete');
		});

		Route::get('jasa','ServiceController@index');
		Route::group(['prefix'=>'jasa'],function(){
			Route::get('create','ServiceController@create');
			Route::post('store','ServiceController@store');
			Route::get('edit','ServiceController@edit');
			Route::post('update','ServiceController@update');
			Route::post('delete','ServiceController@delete');
		});
		// end jasa group

		Route::get('paket','PacketController@index');
		Route::group(['prefix'=>'paket'],function(){
			Route::get('create','PacketController@create');
			Route::post('store','PacketController@store');
			Route::post('edit','PacketController@edit');
			Route::post('update','PacketController@update');
			Route::post('delete','PacketController@delete');
		});

		Route::get('tempat','PlaceController@index');
		Route::group(['prefix'=>'tempat'],function(){
			Route::get('create','PlaceController@create');
			Route::post('store','PlaceController@store');
			Route::post('edit','PlaceController@edit');
			Route::post('update','PlaceController@update');
			Route::post('delete','PlaceController@delete');
		});

		Route::get('setting','SettingController@index');
		Route::group(['prefix'=>"setting"],function(){
			Route::get('create','SettingController@create');
			Route::post('store','SettingController@store');
			Route::post('delete','SettingController@delete');
		});
	});
	// end user middleware
});

// API routes
Route::group(['middleware'=>'api','prefix'=>'api'],function(){
	Route::post('signup','ApiController@signup');
	Route::post('auth/login','ApiController@login');

	Route::group(['middleware'=>'jwt.auth'],function(){
		Route::post('user','ApiController@getAuthUser');

		Route::post('services','ApiController@getServices');

		Route::post('getForm','ApiController@getForm');

		Route::post('getOrders','ApiController@getOrders');

		Route::post('request','ApiController@request');

		Route::post('getRequest','ApiController@getRequest');

		Route::post('getBiodata','ApiController@getBiodata');

		Route::post('cancelOrder','ApiController@cancelOrder');

		Route::post('finishOrder','ApiController@finishOrder');

		Route::post('detailOrder','ApiController@detailOrder');

		Route::post('history','ApiController@history');

	});
});
