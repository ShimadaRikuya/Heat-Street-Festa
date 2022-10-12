<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Mail\SendTestMail;
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
    Route::get('{user_id}/show', [UsersController::class, 'show'])->name('user.show');
    //ユーザ編集画面
    Route::get('{user_id}/edit', [UsersController::class, 'edit'])->name('user.edit');
    //ユーザ更新画面
    Route::post('{user_id}/update', [UsersController::class, 'update'])->name('user.update');
});

// メール送信
Route::post('/mail', [MailController::class, 'send']);
Route::post('/mail/invite', [MailController::class, 'invite'])->name('mail.invite');


/**
 * // 全ユーザ
 * Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
 *     // ユーザ一覧
 *     Route::get('/account', 'AccountController@index')->name('account.index');
 * });
 * 
 * // 管理者以上
 * Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
 *   // ユーザ登録
 *   Route::get('/account/regist', 'AccountController@regist')->name('account.regist');
 *   Route::post('/account/regist', 'AccountController@createData')->name('account.regist');
 * 
 *   // ユーザ編集
 *   Route::get('/account/edit/{user_id}', 'AccountController@edit')->name('account.edit');
 *   Route::post('/account/edit/{user_id}', 'AccountController@updateData')->name('account.edit');
 * 
 *   // ユーザ削除
 *   Route::post('/account/delete/{user_id}', 'AccountController@deleteData');
 * });
 * 
 * // システム管理者のみ
 * Route::group(['middleware' => ['auth', 'can:system-only']], function () {
 * 
 * });
 */

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'teams'], function() {
    // チーム選択処理
    Route::get('/select', [TeamController::class, 'select'])->name('teams.select');
    // 主催者の新規登録
    Route::get('/create', [TeamController::class, 'create'])->name('teams.create');
    // チーム作成登録処理
    Route::post('/', [TeamController::class, 'store']);
    // チーム詳細表示
    Route::get('/{team}', [TeamController::class, 'show']);
    // チーム編集処理
    Route::get('/edit/{team}', [TeamController::class, 'edit']); 
    //チーム更新処理
    Route::post('/update',  [TeamController::class, 'update']);
    // 削除処理
    Route::delete('/delete/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
    // チームに参加処理
    Route::get('/join/{team_id}', [TeamController::class, 'join']);
});

Route::group(['prefix' => 'events'], function () {
    // 一覧
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    // 投稿新規画面
    Route::post('/create', [EventController::class, 'create'])->name('events.create');
    // 投稿新規確認画面
    Route::post('/confirm', [EventController::class, 'confirm'])->name('events.confirm');
    // 登録処理
    Route::post('/', [EventController::class, 'store'])->name('events.store');
    // 詳細
    Route::get('/{event}', [EventController::class, 'show'])->name('events.show');
    // 編集処理
    Route::get('/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    // 更新処理
    Route::put('/{event}', [EventController::class, 'update'])->name('events.update');
    // 削除処理
    Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

// Route::get('gatyas/index', [GatyaController::class, 'index'])->name('gatya_index');
// Route::post('gatyas/complate', [GatyaController::class,'complate']);
