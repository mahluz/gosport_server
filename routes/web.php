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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


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

		Route::get('teknisi','TechnicianController@index');

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

		Route::get('tempat','PlaceController@index');

		Route::get('setting','SettingController@index');
	});
	// end user middleware
});

// API routes
Route::group(['middleware'=>'api','prefix'=>'api'],function(){
	Route::post('auth/login','ApiController@login');

	Route::group(['middleware'=>'jwt.auth'],function(){
		Route::post('user','ApiController@getAuthUser');

		Route::post('services','ApiController@getServices');
	});
});
