<?php

Route::get('/cursos', 'CursoController@index');

Route::get('/', function () {
    return view('index');
});
