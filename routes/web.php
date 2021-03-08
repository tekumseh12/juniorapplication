<?php
use Illuminate\Support\Facades\DB;
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


Route::resource("/", "mainController", ["only"=>['index','store']]);
Route::get('ascending/','AjaxCTRL@index');


Route::get('api/kniznica', "JsonApiCTRL@index");
