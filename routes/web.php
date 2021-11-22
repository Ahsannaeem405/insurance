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

Route::post('register_user',[\App\Http\Controllers\Auth\RegisterController::class,'registeruser']);
Route::get('/logout', [\App\Http\Controllers\HomeController::class,'logout']);

// App::setlocale('en');


Route::view('/pricing', 'pricing');
Route::view('/fex', 'fex');

Route::view('/quotes', 'med');
Route::view('/term', 'term');

Route::prefix('user')->middleware(['auth','user'])->group(function () {
Route::view('/fex','Logged_pages.fex');
Route::view('/quoter','Logged_pages.medd');
Route::view('/term','Logged_pages.term');
Route::view('/crm','Logged_pages.crm');
Route::view('/account','Logged_pages.profile');
Route::view('/invoice', 'Logged_pages.invoice');
Route::view('/creditcard', 'Logged_pages.creditcard');
Route::view('/overview', 'Logged_pages.overview');





});

Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/index',[\App\Http\Controllers\AdminController::class,'dashboard']);
    Route::get('/viewuser', [\App\Http\Controllers\AdminController::class,'user']);
    Route::get('/delete/user/{id}', [\App\Http\Controllers\AdminController::class,'user_del']);
    Route::get('/edit/user/{id}', [\App\Http\Controllers\AdminController::class,'user_edit']);
    Route::post('/update/user/{id}', [\App\Http\Controllers\AdminController::class,'user_update']);
    Route::post('/update/profile/{id}', [\App\Http\Controllers\AdminController::class,'user_update']);

    Route::get('/subscriptions', [\App\Http\Controllers\AdminController::class,'subscriptions']);
    Route::get('/setting', [\App\Http\Controllers\AdminController::class,'setting']);
    Route::get('/profile', [\App\Http\Controllers\AdminController::class,'profile']);


    });







Auth::routes();

