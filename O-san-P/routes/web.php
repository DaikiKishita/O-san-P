<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //登録画面にリダイレクト
    return redirect('/login');
});

//コントローラーの中の関数を指定
Route::get('/register',[
    UserController::class,
    'showRegister'
]);

Route::post('/register',[
    UserController::class,
    'register'
]);

Route::get('/login',[
    UserController::class,
    'loginTo'
]);

Route::post('/login',[
    UserController::class,
    'Userlogin'
]);

Route::middleware('auth')->group(function (){
    Route::get('/profile',
    [UserController::class,'profile']
    )->name('profile');

    Route::get('/edit',
    [UserController::class,'show_editer']
    )->name('show_editer');

    Route::post('/edit',
    [UserController::class,'edit']
    )->name('edit');

});


Route::post('logout',
    [UserController::class,'logout']
    )->name('user.logout');
