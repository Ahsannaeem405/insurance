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
    return view('home');
});
Route::view('/login','login');
Route::view('/signup', 'signup');
Route::view('/pricing', 'pricing');
Route::view('/test', 'test');
Route::view('/fex', 'fex');
Route::view('/med', 'med');
Route::view('/term', 'term');





