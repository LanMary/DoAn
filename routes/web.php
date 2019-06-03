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
Route::get('index',[
'as'=>'trang-chu',
'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getLoaisp'
]);
Route::get('loaisanpham_all',[
    'as'=>'loaisanphamall',
    'uses'=>'PageController@getSpall'   
]);
Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChitietsp'
]);
Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'PageController@getContact'
]);
Route::get('about',[
    'as'=>'about',
    'uses'=>'PageController@getAbout'
]);
Route::get('checkout',[
    'as'=>'checkout',
    'uses'=>'PageController@checkout'
]);
Route::get('add_to_cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);
Route::get('del_cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@DelItemCart'
]);

Route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/Product','productcontroller');