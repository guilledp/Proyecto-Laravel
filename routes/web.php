<?php

Auth::routes();

Route::get('/', function () {
  return view('/auth/login');
});

Route::get('/cursos', 'HomeController@misCursos');
Route::get('/miPerfil', 'HomeController@miPerfil');
Route::get('/curso', 'HomeController@verCurso');
Route::get('/examen', 'HomeController@hacerExamen');
Route::get('/editar', 'HomeController@editarCurso');
