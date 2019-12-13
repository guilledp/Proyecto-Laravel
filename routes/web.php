<?php

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/cursos', 'cursoController@mostrarCursos');
Route::get('/miPerfil', 'HomeController@miPerfil');
Route::get('/curso', 'HomeController@verCurso');

Route::get('/examen', 'HomeController@hacerExamen');
Route::get('/editar', 'HomeController@editarCurso');

Route::get('/crear', 'cursoController@crearCurso');
Route::post('/crear', 'cursoController@guardarCurso');
