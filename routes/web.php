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
Route::get('resume','Resume@index');
Route::get('resume/create','Resume@create');
// Route::get('resume/insert','Resume@insert')->name('upload.file');
Route::post('resume/insert','Resume@insert');
Route::post('resume/update','Resume@update');
Route::get('resume/delete','Resume@delete');

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');


/*Route::get('resume/add', 'Resume@create');
Route::post('resume/add', 'Resume@store');*/
// Route::get('/hello', 'Hello@index');

Route::get('/', function () {
    return view('welcome');
});


// Route::get('hello', 'Hello@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
