<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginRegister\LoginRegisterController;
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
    return view('index');
})->name('home_page');

//ログインメンバーの登録
Route::get('login_register', [LoginRegisterController::class,'index'])->name('login_register_form');
Route::post('login_register', [LoginRegisterController::class,'create'])->name('login_register');
Route::post('user_delete', [LoginRegisterController::class,'user_delete'])->name('user_delete');

//ログイン
Route::get('login', [LoginController::class,'showLoginForm'])->name('login_show');
Route::post('login', [LoginController::class,'login'])->name('login_check');


//お問い合わせフォーム
//表示
Route::get('form', [ContactFormController::class,'index'])->name('contact_form_show');
Route::post('form', [ContactFormController::class,'create'])->name('contact_form_register');



Route::middleware('auth')->group(
    function(){

        Route::get('home', [HomeController::class,'index'])->name('home');
        Route::post('content_detail', [HomeController::class,'detail'])->name('detail');
        Route::post('message_delete', [HomeController::class,'delete'])->name('message_delete');
        Route::get('reply/{id}', [HomeController::class,'reply_view'])->name('reply_view');
        Route::post('reply_email', [HomeController::class,'send_email'])->name('send_email');
        Route::get('reply_history/{id}', [HomeController::class,'reply_email'])->name('reply_email');
        Route::get('reply_history_detail/{id_1}/{id_2}', [HomeController::class,'reply_email_detail'])->name('reply_email_detail');
        Route::post('reply_email_delete', [HomeController::class,'reply_email_delete'])->name('reply_delete');
        //登録
        Route::get('category_register', [HomeController::class,'category_show'])->name('category_register_show');
        Route::post('category_register', [HomeController::class,'category_register'])->name('category_register');
        Route::post('category_delete/{id}', [HomeController::class,'category_delete'])->name('category_delete');


        //ログアウト
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');





});
