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


// Route::get('/', function(){
// 	$name = ['Nguyen Hoang Duy','Nguyen Thanh Don'];
// 	return	view('welcome',['name'=> $name]);
// })->name('home');

Route::get('/',function(){
	return view('layouts.web');
})->name('home.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
