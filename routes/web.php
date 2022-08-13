<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Http\Controllers\GatyaController;
use App\Mail\InviteMail;
use App\Http\Controllers\MailController;

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
    return view('top');
});

Auth::routes();

Route::group(['prefix' => 'users'], function() {
    // ユーザ詳細画面
    Route::get('{user_id}/show', [App\Http\Controllers\UsersController::class, 'show'])->name('user.show');
    //ユーザ編集画面
    Route::get('{user_id}/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('user.edit');
    //ユーザ更新画面
    Route::post('{user_id}/update', [App\Http\Controllers\UsersController::class, 'update'])->name('user.update');
});

Route::get('/mail', [MailController::class,'send']);

// 全ユーザ
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    // ユーザ一覧
    Route::get('/account', 'AccountController@index')->name('account.index');
});

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
  // ユーザ登録
  Route::get('/account/regist', 'AccountController@regist')->name('account.regist');
  Route::post('/account/regist', 'AccountController@createData')->name('account.regist');

  // ユーザ編集
  Route::get('/account/edit/{user_id}', 'AccountController@edit')->name('account.edit');
  Route::post('/account/edit/{user_id}', 'AccountController@updateData')->name('account.edit');

  // ユーザ削除
  Route::post('/account/delete/{user_id}', 'AccountController@deleteData');
});

// システム管理者のみ
Route::group(['middleware' => ['auth', 'can:system-only']], function () {

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('event/all', 'App\Http\Controllers\EventController@index')->name('event_all');
// 投稿新規画面
Route::get('event/new', 'App\Http\Controllers\EventController@new')->name('event_new');
// 投稿新規処理
Route::post('/events', 'App\Http\Controllers\EventController@store');

Route::get('gatyas/index', 'App\Http\Controllers\GatyaController@index')->name('gatya_index');
Route::post('gatyas/complate', 'App\Http\Controllers\GatyaController@complate');