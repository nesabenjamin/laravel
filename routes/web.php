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
/*
Route::get('/', function () {
    //$data =
    return view('staffviewController');
});*/

Route::get('/','staffviewController@index');
Route::get('/getHTML','staffviewController@ajax' );
Route::get('/getApproval','staffviewController@approval' );
Route::get('/pdf','staffviewController@pdf');
Route::get('/zip','staffviewController@zip');