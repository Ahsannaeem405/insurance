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

Route::prefix('user')->group(function () {
Route::view('/fex','Logged_pages.fex');
Route::view('/quoter','Logged_pages.medd');
Route::view('/term','Logged_pages.term');
Route::view('/crm','Logged_pages.crm');
Route::view('/account','Logged_pages.profile');
Route::view('/invoice', 'Logged_pages.invoice');
Route::view('/creditcard', 'Logged_pages.creditcard');
Route::view('/overview', 'Logged_pages.overview');





});





