<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('event/all', 'App\Http\Controllers\EventController@index')->name('event_all');
// 投稿新規画面
Route::get('event/new', 'App\Http\Controllers\EventController@new')->name('event_new');
// 投稿新規処理
Route::post('/events','App\Http\Controllers\EventController@@store');
// 投稿確認画面
Route::get('/form/confirm', "SampleFormController@confirm")->name("form.confirm");