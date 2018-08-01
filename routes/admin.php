<?php 


Route::get('/posts', 'HomeController@index');
// Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/','Admin\DasboardController@index')->name('dashboard');

Route::group(['namespace' => 'Admin'], function(){

	Route::get('categories','CategoryController@index')->name('category.index');
	Route::get('categories/create','CategoryController@create')->name('category.create');
	Route::post('categories/store','CategoryController@store')->name('category.store');
	Route::get('categories/edit/{id}','CategoryController@edit')->name('category.edit');
	Route::post('categories/update/{id}','CategoryController@update')->name('category.update');
	Route::get('categories/destroy/{id}','CategoryController@destroy')->name('category.destroy')->middleware('isAdmin');


	Route::get('admins','AdminController@index')->name('admin.index')->middleware('isAdmin');
	Route::get('admins/create','AdminController@create')->name('admin.create')->middleware('isAdmin');
	Route::post('admins/store','AdminController@store')->name('admin.store')->middleware('isAdmin');
	Route::get('admins/edit/{id}','AdminController@edit')->name('admin.edit');
	Route::post('admins/update/{id}','AdminController@update')->name('admin.update');
	Route::get('admins/destroy/{id}','AdminController@destroy')->name('admin.destroy')->middleware('isAdmin');
	Route::get('admins/profile/{id}','AdminController@getProfile')->name('admin.getProfile');


	
	Route::get('admins/profile/edit/{id}','ProfileController@edit')->name('profile.edit');
	Route::post('admins/profile/update/{id}','ProfileController@update')->name('profile.update');

	Route::get('posts','PostController@index')->name('post.index');
	Route::get('posts/create','PostController@create')->name('post.create');
	Route::post('posts/store','PostController@store')->name('post.store');
	Route::get('posts/edit/{id}','PostController@edit')->name('post.edit');
	Route::post('posts/update/{id}','PostController@update')->name('post.update');
	Route::get('posts/destroy/{id}','PostController@destroy')->name('post.destroy')->middleware('isAdmin');

	Route::get('tags','TagController@index')->name('tag.index');
	Route::post('tags/store','TagController@store')->name('tag.store');
	Route::get('tags/edit/{id}','TagController@edit')->name('tag.edit');
	Route::post('tags/update/{id}','TagController@update')->name('tag.update');
	Route::get('tags/destroy/{id}','TagController@destroy')->name('tag.destroy');
});


