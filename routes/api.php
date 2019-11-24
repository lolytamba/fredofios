<?php

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/kontakform','KontakController@store');
Route::post('/register','UserController@create');
//Route::post('/login','UserController@login');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login','UserController@login'); //web platform
});


//====================Api Galeri====================
Route::post('/galeri','GaleriController@store');
Route::get('/galeri','GaleriController@index');
Route::get('/galeri/{id}','GaleriController@show');
Route::post('/galeri/{id}','GaleriController@update');
Route::delete('/galeri/{id}','GaleriController@destroy');

//====================Api Akademik====================
Route::post('/akademik','AkademikController@store');
Route::get('/akademik','AkademikController@index');
Route::get('/akademik/{id}','AkademikController@show');
Route::post('/akademik/{id}','AkademikController@update');
Route::delete('/akademik/{id}','AkademikController@destroy');

//====================Api Akademik====================
Route::post('/nonakademik','NonAkademikController@store');
Route::get('/nonakademik','NonAkademikController@index');
Route::get('/nonakademik/{id}','NonAkademikController@show');
Route::post('/nonakademik/{id}','NonAkademikController@update');
Route::delete('/nonakademik/{id}','NonAkademikController@destroy');

//====================Api Fasilitas====================
Route::post('/fasilitas','FasilitasController@store');
Route::get('/fasilitas','FasilitasController@index');
Route::get('/fasilitas/{id}','FasilitasController@show');
Route::post('/fasilitas/{id}','FasilitasController@update');
Route::delete('/fasilitas/{id}','FasilitasController@destroy');

//====================Api Staff====================
Route::post('/staff','StaffController@store');
Route::get('/staff','StaffController@index');
Route::get('/staff/{id}','StaffController@show');
Route::post('/staff/{id}','StaffController@update');
Route::delete('/staff/{id}','StaffController@destroy');

//====================Api Misi====================
Route::post('/misi','MisiController@store');
Route::get('/misi','MisiController@index');
Route::get('/misi/{id}','MisiController@show');
Route::post('/misi/{id}','MisiController@update');
Route::delete('/misi/{id}','MisiController@destroy');

//====================Api Artikel====================
Route::post('/artikel','ArtikelController@store');
Route::get('/artikel','ArtikelController@index');
Route::get('/artikel/{id}','ArtikelController@show');
Route::post('/artikel/{id}','ArtikelController@update');
Route::delete('/artikel/{id}','ArtikelController@destroy');