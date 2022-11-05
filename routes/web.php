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
Route::group(['prefix' => 'gatyas', 'as' => 'gatyas.'], function() {
    Route::get('/get', [GatyaController::class, 'store']);
    Route::post('/{gatya}/update', [GatyaController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'users'], function() {
    // マイページ
    Route::get('{user_name}', [UsersController::class, 'index'])->name('user.index');
    // ユーザ詳細画面
    Route::get('{user_id}/show', [UsersController::class, 'show'])->name('user.show');
    //ユーザ編集画面
    Route::get('{user_id}/edit', [UsersController::class, 'edit'])->name('user.edit');
    //ユーザ更新画面
    Route::post('{user_id}/update', [UsersController::class, 'update'])->name('user.update');
    // フォロー
    Route::post('{user}/follow', [UsersController::class, 'follow'])->name('follow');
    // フォロー解除
    Route::post('{user}/unfollow', [UsersController::class, 'unfollow'])->name('unfollow');
});

// メール送信
Route::post('mail', [MailController::class, 'send'])->middleware(['auth']);

// チーム
Route::group(['prefix' => 'teams', 'as' => 'teams.'], function() {
    // チーム選択処理
    Route::get('/select', [TeamController::class, 'getSelect'])->name('select');
    // 主催者の新規登録
    Route::get('/create', [TeamController::class, 'create'])->name('create');
    // チーム作成登録処理
    Route::post('/', [TeamController::class, 'store']);
    // チーム詳細表示
    Route::get('/{team}', [TeamController::class, 'show'])->name('show');
    // チーム編集処理
    Route::get('/{team}/edit', [TeamController::class, 'edit'])->name('edit'); 
    //チーム更新処理
    Route::post('/update',  [TeamController::class, 'update']);
    // 削除処理
    Route::delete('/{team}/delete', [TeamController::class, 'destroy'])->name('destroy');
    // チームに参加処理
    Route::get('/join/{team_id}', [TeamController::class, 'join']);
    // 招待
    Route::get('/invite/{team_id}', [TeamController::class, 'create_invitation_url']);
    // メールからチームに参加
    Route::get('/email_join/{team_id}/{token}', [TeamController::class, 'email_join']);
});

// イベント
Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
    // 一覧
    Route::get('', [EventController::class, 'index'])->name('index');
    // 検索機能
    Route::get('/search', [EventController::class, 'keyword'])->name('keyword');
    // カテゴリ別
    Route::get('/{category_id}/{category}', [EventController::class, 'search'])->where('category', '(パーティー|ミュージック|グルメ|ゲーム|スポーツ|ビジネス)');
    // 詳細
    Route::get('/{event}/show', [EventController::class, 'show'])->name('show');
    // ログイン確認必須
    Route::group(['middleware' => 'auth'], function(){
        // 新規投稿画面
        Route::get('/create/{team}', [EventController::class, 'create'])->name('create');
        // 確認画面
        Route::get('/confirm', [EventController::class, 'getConfirm'])->name('confirm');
        Route::post('/confirm', [EventController::class, 'confirm'])->name('confirm');
        // 登録処理
        Route::post('/', [EventController::class, 'store'])->name('store');
        // 編集処理
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
        // 更新処理
        Route::post('/{event}', [EventController::class, 'update'])->name('update');
        // 削除処理
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');
    });
});