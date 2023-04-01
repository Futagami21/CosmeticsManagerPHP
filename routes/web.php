<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CosmeticsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordController;

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

//お問い合わせページ
Route::get('/contact',[ContactController::class,'show_contact'])->name('contact');
//お問い合わせの確認画面
Route::post('/contact_confirm',[ContactController::class,'contact_confirm']);
//お問い合わせ登録、完了画面表示
Route::post('/contact_complete',[ContactController::class,'contact_complete']);

//ログイン前
Route::group(['middleware' => ['guest']], function () {
    //トップ　ログインフォーム表示
    Route::get('/',[AuthController::class,'show_login'])->name('show_login');
    //ログイン処理
    Route::post('/login',[AuthController::class,'login'])->name('login');
    //ログイン直打ちでトップに。
    Route::get('/login',[AuthController::class,'show_login']);
    //登録からのログイン処理
    Route::post('/sign_uplogin',[AuthController::class,'signup_login'])->name('signup_login');
    
    //新規登録ページ表示
    Route::get('/show_signup',[UserController::class,'show_signup'])->name('signup');
    //新規登録の確認画面
    Route::post('/signup_confirm',[UserController::class,'signup_confirm']);
    //新規登録
    Route::post('/signup_complete',[UserController::class,'signup']);

    //パスワードリセット表示画面
    Route::get('/show_reset',[PasswordController::class,'show_reset'])->name('show_reset');
    //メールでパスワードリセットリンク送信
    Route::post('/reset_mail_send',[PasswordController::class,'reset_mail_send'])->name('reset_mail_send');
    //送信完了画面
    Route::get('/send_complete',[PasswordController::class,'send_complete'])->name('send_complete');
    //パスワード再設定
    Route::get('/password_edit',[PasswordController::class,'password_edit'])->name('password_edit');
    //パスワード更新
    Route::post('/password_update',[PasswordController::class,'password_update'])->name('password_update');
    //パスワードリセット完了画面
    Route::get('/reset_complete',[PasswordController::class,'reset_complete'])->name('reset_complete');

    //管理者ログインフォーム
    Route::get('admin_login', [AdminController::class, 'show_admin_login'])->name('show_admin_login');
    //管理者ログイン
    Route::post('admin_login', [AdminController::class, 'admin_login'])->name('admin_login');
    //管理者ログアウト
    Route::post('admin_logout', [AdminController::class, 'admin_logout'])->name('admin_logout');
});

//ログイン中
Route::group(['middleware' => ['auth:web']], function () {
    // Route::get('/home', function () {
    //     return view('home');
    // })->name('home');
    //ホーム
    Route::get('/home',[CosmeticsController::class,'home'])->name('home');
    


    //化粧品登録ページ
    Route::get('/cosmetics_register',[CosmeticsController::class,'show_cosmetics_register'])->name('show_register');
    //化粧品登録
    Route::post('/register',[CosmeticsController::class,'cosmetics_register'])->name('register');
    //化粧品一覧表示
    Route::get('/cosmetics_list',[CosmeticsController::class,'show_cosmetics_list'])->name('show_cosmetics_list');
    //化粧品詳細表示
    Route::get('/cosmetics_detail/{id}',[CosmeticsController::class,'cosmetics_detail'])->name('cosmetics_detail');
    //化粧品編集表示
    Route::get('/cosmetics_edit/{id}',[CosmeticsController::class,'show_cosmetics_edit'])->name('show_cosmetics_edit');
    //化粧品編集
    Route::post('/cosmetics_edit_confirm/{id}',[CosmeticsController::class,'cosmetics_edit']);
    //化粧品削除画面
    Route::get('/cosmetics_delete/{id}',[CosmeticsController::class,'show_cosmetics_delete'])->name('show_cosmetics_delete');
    //化粧品削除
    Route::post('/cosmetics_delete_confirm/{id}',[CosmeticsController::class,'cosmetics_delete'])->name('cosmetics_delete');

    //おすすめ一覧ページ
    Route::get('/recomend_list',[CosmeticsController::class,'recomend_list'])->name('recomend_list');
    //おすすめ詳細表示
    Route::get('/recomend_detail/{id}',[CosmeticsController::class,'recomend_detail'])->name('recomend_detail');
    //おすすめ登録確認
    Route::get('/recomend/{id}',[CosmeticsController::class,'confirm_recomend'])->name('confirm_recomend');
    //おすすめ登録と完了表示
    Route::post('/recomend/{id}',[CosmeticsController::class,'complete_recomend'])->name('complete_recomend');
    //おすすめ登録解除 一覧
    Route::get('/recomend_unregister_for_list/{id}',[CosmeticsController::class,'recomend_unregist_for_list'])->name('recomend_unregist_for_list');
    //おすすめ登録解除 詳細
    Route::get('/recomend_unregister_for_detail/{id}',[CosmeticsController::class,'recomend_unregist_for_detail'])->name('recomend_unregist_for_detail');
    //いいね機能
    Route::post('/like',[CosmeticsController::class,'like'])->name('like');

    //お気に入り
    Route::get('/favorite/{id}',[CosmeticsController::class,'favorite'])->name('favorite');

    //マイページ
    Route::get('/mypage',[UserController::class,'mypage'])->name('mypage');
    //ユーザ編集画面表示
    Route::get('/user_edit/{id}',[UserController::class,'show_user_edit'])->name('show_user_edit');
    //ユーザ編集登録
    Route::post('/user_edit_confirm/{id}',[UserController::class,'user_edit']);
    //ユーザ削除画面
    Route::get('/user_delete/{id}',[UserController::class,'show_user_delete'])->name('show_user_delete');
    //ユーザ削除
    Route::post('/user_delete_complete',[UserController::class,'user_delete_complete']);

    //ログアウト
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});


//管理ログイン中
Route::group(['middleware' => ['auth:admins']], function () {
    //管理トップ
    Route::get('admin_top',[AdminController::class, 'admin_top'])->name('admin_top');

    //お問い合わせ一覧
    Route::get('contact_list',[AdminController::class, 'contact_list'])->name('contact_list');
    //お問い合わせ詳細
    Route::get('contact_detail/{id}',[AdminController::class, 'contact_detail'])->name('contact_detail');
    //お問い合わせ削除
    Route::post('contact_delete/{id}',[AdminController::class, 'contact_delete'])->name('contact_delete');


    //ユーザ一覧
    Route::get('users_list',[AdminController::class, 'users_list'])->name('users_list');
    //ユーザ削除
    Route::post('admin_user_delete/{id}',[AdminController::class, 'admin_user_delete'])->name('admin_user_delete');
    
});