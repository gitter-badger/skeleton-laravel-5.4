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

// app/routes.php
 Route::get('/', array('as' => 'home', function()
{
    return View::make('home');
}));



//Route::get('/', function () {
//    return view('welcome');
//});