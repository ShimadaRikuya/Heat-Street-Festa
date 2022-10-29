<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\Event;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GatyaController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();
Route::group(['prefix' => 'gatyas'], function() {
    Route::get('/get', [GatyaController::class, 'store']);
});

Route::group(['prefix' => 'users'], function() {
    // ユーザ詳細画面
    Route::get('{user_id}/show', [UsersController::class, 'show'])->name('user.show');
    //ユーザ編集画面
    Route::get('{user_id}/edit', [UsersController::class, 'edit'])->name('user.edit');
    //ユーザ更新画面
    Route::post('{user_id}/update', [UsersController::class, 'update'])->name('user.update');
});

// メール送信
Route::post('mail', [MailController::class, 'send'])->middleware(['auth']);

// チーム
Route::group(['prefix' => 'teams'], function() {
    // チーム選択処理
    Route::get('/select', [TeamController::class, 'select'])->name('teams.select');
    // 主催者の新規登録
    Route::get('/create', [TeamController::class, 'create'])->name('teams.create');
    // チーム作成登録処理
    Route::post('/', [TeamController::class, 'store']);
    // チーム詳細表示
    Route::get('/{team}', [TeamController::class, 'show'])->name('team.show');
    // チーム編集処理
    Route::get('/edit/{team}', [TeamController::class, 'edit']); 
    //チーム更新処理
    Route::post('/update',  [TeamController::class, 'update']);
    // 削除処理
    Route::delete('/delete/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
    // チームに参加処理
    Route::get('/join/{team_id}', [TeamController::class, 'join']);
    // 招待
    Route::get('/invite/{team_id}', [TeamController::class, 'create_invitation_url']);
    // メールからチームに参加
    Route::get('/email_join/{team_id}/{token}', [TeamController::class, 'email_join'])->name('team.invite');
});

// イベント
Route::group(['prefix' => 'events'], function () {
    // 一覧
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    // 検索機能
    Route::get('/search', [EventController::class, 'keyword'])->name('events.keyword');
    // カテゴリ別
    Route::get('/{category_id}/{category}', [EventController::class, 'search'])->where('category', '(パーティー|ミュージック|グルメ|ゲーム|スポーツ|ビジネス)');
    // 投稿新規画面
    Route::post('/create', [EventController::class, 'create'])->middleware(['auth'])->name('events.create');
    // 投稿新規確認画面
    Route::post('/confirm', [EventController::class, 'confirm'])->middleware(['auth'])->name('events.confirm');
    // 登録処理
    Route::post('/', [EventController::class, 'store'])->middleware(['auth'])->name('events.store');
    // 詳細
    Route::get('/{event}/show', [EventController::class, 'show'])->name('events.show');
    // 編集処理
    Route::get('/{event}/edit', [EventController::class, 'edit'])->middleware(['auth'])->name('events.edit');
    // 更新処理
    Route::put('/{event}', [EventController::class, 'update'])->middleware(['auth'])->name('events.update');
    // 削除処理
    Route::delete('/{event}', [EventController::class, 'destroy'])->middleware(['auth'])->name('events.destroy');
});