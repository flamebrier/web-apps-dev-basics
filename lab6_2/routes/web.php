<?php

use Illuminate\Support\Facades\Route;
use App\Client;
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

Route::get('/', 'ClientsController@index');
Route::get('create', 'ClientsController@create');
Route::get('delete/{id}', 'ClientsController@destroy');
Route::get('add-to-queue/{id}', 'ClientsController@addToQueue');
Route::get('queue/', 'ClientsController@queue');
