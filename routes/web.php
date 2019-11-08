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

Route::get('/index', function () {

  $user = 'guille';
  $email = 'guilledp@hotmail.com';

  $datos = compact('user','email');

  return view('index',$datos);

});

Route::get('/miPrimeraRuta', function () {

  return view('miPrimeraRuta');

});

Route::get('/esPar/{numero}', function ($numero) {

    if (($numero%2)===0) {
      $decir ='el numero es par';
    }else {
      $decir='el numero es Impar';
    }

    return view('esPar',compact('decir'));

});
