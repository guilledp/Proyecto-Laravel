<?php

Route::get('/cursos', 'CursoController@index');

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
