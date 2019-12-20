<?php

Auth::routes();

// Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/', 'Auth\LoginController@showLoginForm')->name('login');


Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/', 'CursoController@index')->name('home');
	Route::post('/user/update-avatar', 'UserController@updateAvatar')->name('update-avatar');
	Route::post('/user/update-logo', 'UserController@updateLogo')->name('update-logo');
	Route::post('/user/update', 'UserController@update')->name('user-update');
	//Route::get('/home', 'CursoController@index')->name('home');

	Route::get('/miPerfil', 'HomeController@miPerfil')->name('miPerfil');
	Route::get('/curso/{uuid}/examen', 'CursoController@examen')->name('curso.examen');
	
	Route::resource('/cursos', 'CursoController')
		->names([
			'index' => 'cursos.index',
			'create' => 'curso.create',
			'update' => 'curso.update',
			'store' => 'curso.store',
			'show' => 'curso.show',
			'edit' => 'curso.edit'
		]);

});

