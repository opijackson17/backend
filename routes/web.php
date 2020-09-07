<?php

use Illuminate\Support\Facades\Route;

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

Route::get('universities', 'UniverstyController@index');
Route::POST('save', 'UniverstyController@store');

Route::get('hostels', 'HostelController@index');
Route::get('displayHostelInfo/{id}', 'HostelController@edit');
Route::get('displayRegisteredHostels', 'HostelController@create');
Route::POST('store', 'HostelController@store');

Route::POST('location', 'HostelController@storeLocation');
Route::POST('room', 'HostelController@storeRoom');
