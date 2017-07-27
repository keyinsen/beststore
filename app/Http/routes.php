<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Route::get('home/index','Home\\IndexController@index');
//后台模块的路由群组
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){
	Route::get('index','GoodController@index');
	Route::post('good/add','GoodController@add');
});


Route::group(['prefix' => 'home','namespace' => 'Home'],function(){
	Route::get('index','IndexController@index');
	Route::get('login', 'AuthenticateController@login');
	Route::get('register', 'AuthenticateController@registerindex');
	Route::post('registers', 'AuthenticateController@registers');
	Route::post('auth', 'AuthenticateController@auth');
	Route::get('logout', 'AuthenticateController@logout');
	Route::any('category', 'CategoryController@index');
	Route::post('search_up', 'SearchController@search_up');
	Route::get('search', 'SearchController@index');
	Route::get('single', 'SingleController@index');
	Route::get('order/{id}', 'OrderController@index');
    Route::get('myOrder', 'OrderController@myOrder');
	Route::get('myOrder/del', 'OrderController@del');
    Route::get('store/{id}', 'OrderController@store');
	Route::get('image', 'OrderController@image');
	Route::get('images', 'OrderController@images');
	Route::get('cropImages', 'OrderController@cropImages');
	Route::group(['prefix' => 'cart','middleware' => 'auth'],function(){
		Route::get('/', 'CartController@index');
		Route::post('add', 'CartController@add');
		Route::post('del', 'CartController@del');
		Route::post('update/{id}', 'CartController@update')->where('id','\d+');
		Route::post('delete/{id}', 'CartController@delete')->where('id','\d+');
	});
});
	Route::get('/b', function(){
		$img = Image::make('images/LaravelAcademy.jpg')->resize(300, 200);
		return $img->response('jpg');
	});
		Route::get('/image/grayscale', function(){
			$img = Image::make(public_path('images/LaravelAcademy.jpg'))->greyscale();
			return $img->response('jpg');
		});

//后台模块的路由群组
// Route::group(['namespace' => 'Admin'],function(){
// 	Route::get('admin/index','IndexController@index');
// });

Route::get('/', function () {
    return view('welcome');
});
