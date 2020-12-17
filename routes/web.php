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
Route::get("/converter", "ConverterController@index")->name("converter.index");
Route::post("/converter", "ConverterController@convert")->name("converter.convert");

Route::get("/converter-test", "ConverterControllerTest@index")->name("converter-test.index");
Route::post("/converter-test", "ConverterControllerTest@callConvertApi")->name("converter-test.convert");
