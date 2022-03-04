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


Route::get('import',[\App\Http\Controllers\UserController::class,'import']);
Route::post('import/data',[\App\Http\Controllers\UserController::class,'import_data']);

Route::get('/', [\App\Http\Controllers\UserController::class,'home'])->middleware('lang');

Route::post('register_user',[\App\Http\Controllers\Auth\RegisterController::class,'registeruser'])->middleware('lang');
Route::get('/logout', [\App\Http\Controllers\HomeController::class,'logout'])->middleware('lang');
Route::get('/promo', [\App\Http\Controllers\UserController::class,'promo'])->middleware('lang');



// App::setlocale('en');


Route::get('/pricing', [\App\Http\Controllers\PricingController::class,'pricing'])->middleware('lang');
Route::view('/fex', 'fex')->middleware('lang');

Route::view('/quotes', 'med')->middleware('lang');
Route::view('/term', 'term')->middleware('lang');
Route::get('/lang/{lang}', [\App\Http\Controllers\UserController::class,'lang'])->middleware('lang');

Route::prefix('user')->middleware(['auth','user','lang'])->group(function () {
//disable
    Route::get('/disable', [\App\Http\Controllers\UserController::class,'disable']);
    //crm
Route::post('/pushToCrm',[\App\Http\Controllers\CrmController::class,'push']);
Route::post('/pushToCrm/manual',[\App\Http\Controllers\CrmController::class,'pushManual']);
Route::get('/dashboard',[\App\Http\Controllers\CrmController::class,'dashboard']);

    //fex routes
Route::get('/fex',[\App\Http\Controllers\FexController::class,'index']);
Route::get('/fex/quote/compare',[\App\Http\Controllers\FexController::class,'compare']);
Route::post('get_quote_compare_fex',[\App\Http\Controllers\FexController::class,'compare_fex']);
Route::get('fex/setting',[\App\Http\Controllers\FexController::class,'setting']);
Route::post('fex/setting/update',[\App\Http\Controllers\CompanyDisableController::class,'setting_update']);

    Route::post('/get_quote_fex', [\App\Http\Controllers\FexController::class,'quoter']);

//condition
    Route::get('/get_condition_fex', [\App\Http\Controllers\FexController::class,'condition']);
    Route::get('/get_condition_qa_fex', [\App\Http\Controllers\FexController::class,'condition_qa']);
    Route::get('/get_condition_qa_fex_next', [\App\Http\Controllers\FexController::class,'condition_qa_next']);
    Route::post('/get_combo_fex', [\App\Http\Controllers\FexController::class,'get_combo_fex']);

//medication

    Route::get('/get_medication_fex', [\App\Http\Controllers\FexController::class,'medications']);
    Route::get('/get_medication_condition_fex', [\App\Http\Controllers\FexController::class,'medication_condition']);

    Route::get('/get_condition_qa_med_fex', [\App\Http\Controllers\FexController::class,'condition_qa_med']);
    Route::get('/get_condition_qa_med_length_fex', [\App\Http\Controllers\FexController::class,'condition_qa_med_len']);

//term routes
    Route::get('/term',[\App\Http\Controllers\TermController::class,'index']);
    Route::post('/get_quote_term', [\App\Http\Controllers\TermController::class,'quoter']);
    Route::get('term/setting',[\App\Http\Controllers\TermController::class,'setting']);
    Route::post('term/setting/update',[\App\Http\Controllers\CompanyDisableController::class,'setting_update_term']);

    Route::get('/term/quote/compare',[\App\Http\Controllers\TermController::class,'compare']);
    Route::post('get_quote_compare_term',[\App\Http\Controllers\TermController::class,'compare_term']);


    //condition
    Route::get('/get_condition_term', [\App\Http\Controllers\TermController::class,'condition']);
    Route::get('/get_condition_qa_term', [\App\Http\Controllers\TermController::class,'condition_qa']);
    Route::get('/get_condition_qa_term_next', [\App\Http\Controllers\TermController::class,'condition_qa_next']);
    Route::post('/get_combo_term', [\App\Http\Controllers\TermController::class,'get_combo_fex']);


    //medication

    Route::get('/get_medication_term', [\App\Http\Controllers\TermController::class,'medications']);
    Route::get('/get_medication_condition_term', [\App\Http\Controllers\TermController::class,'medication_condition']);

    Route::get('/get_condition_qa_med_term', [\App\Http\Controllers\FexController::class,'condition_qa_med']);
    Route::get('/get_condition_qa_med_length_term', [\App\Http\Controllers\FexController::class,'condition_qa_med_len']);


    //legeal checker term
    Route::get('/legeal/checker/term',[\App\Http\Controllers\LegealCheckerTermController::class,'index']);

    Route::get('/get_condition_qa_lterm', [\App\Http\Controllers\LegealCheckerTermController::class,'condition_qa']);
    Route::get('/get_condition_qa_lterm_next', [\App\Http\Controllers\LegealCheckerTermController::class,'condition_qa_next']);
    Route::post('/get_quote_lterm', [\App\Http\Controllers\LegealCheckerTermController::class,'quoter']);


    //legeal checker fex

    Route::get('/legeal/checker/fex',[\App\Http\Controllers\LegealCheckerFexController::class,'index']);

    Route::get('/get_condition_qa_lfex', [\App\Http\Controllers\LegealCheckerFexController::class,'condition_qa']);
    Route::get('/get_condition_qa_lfex_next', [\App\Http\Controllers\LegealCheckerFexController::class,'condition_qa_next']);
    Route::post('/get_quote_lfex', [\App\Http\Controllers\LegealCheckerFexController::class,'quoter']);






    Route::view('/quoter','Logged_pages.medd');

Route::view('/crm','Logged_pages.crm');
Route::get('/account',[\App\Http\Controllers\UserController::class,'account']);
Route::post('/update/profile',[\App\Http\Controllers\UserController::class,'profile_update']);
Route::get('/buy/plan',[\App\Http\Controllers\UserController::class,'buy_now']);
Route::post('/pay',[\App\Http\Controllers\UserController::class,'buy_now_pay']);
Route::view('/invoice', 'Logged_pages.invoice');
Route::view('/creditcard', 'Logged_pages.creditcard');
Route::view('/overview', 'Logged_pages.overview');




});

    Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/index',[\App\Http\Controllers\AdminController::class,'dashboard']);
    Route::get('/viewuser', [\App\Http\Controllers\AdminController::class,'user']);
    Route::get('/delete/user/{id}', [\App\Http\Controllers\AdminController::class,'user_del']);
    Route::get('/edit/user/{id}', [\App\Http\Controllers\AdminController::class,'user_edit']);
    Route::get('/enable/user/{id}/{status}', [\App\Http\Controllers\AdminController::class,'user_enable']);
    Route::post('/update/user/{id}', [\App\Http\Controllers\AdminController::class,'user_update']);
    Route::post('/update/profile/{id}', [\App\Http\Controllers\AdminController::class,'user_update']);

    Route::get('/subscriptions', [\App\Http\Controllers\AdminController::class,'subscriptions']);
    Route::get('/setting', [\App\Http\Controllers\AdminController::class,'setting']);
    Route::get('/coupon', [\App\Http\Controllers\AdminController::class,'coupon']);
    Route::post('/coupan/add', [\App\Http\Controllers\AdminController::class,'coupon_add']);
    Route::get('/coupan/del/{id}', [\App\Http\Controllers\AdminController::class,'coupon_del']);
    Route::post('/coupan/edit/{id}', [\App\Http\Controllers\AdminController::class,'coupon_edit']);
    Route::post('/update/setting', [\App\Http\Controllers\AdminController::class,'update_setting']);
    Route::get('/profile', [\App\Http\Controllers\AdminController::class,'profile']);
    Route::get('/upload', [\App\Http\Controllers\AdminController::class,'admin_upload']);
    Route::post('upload/data', [\App\Http\Controllers\AdminController::class,'upload_data']);


    });



Auth::routes();

