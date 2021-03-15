<?php

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
Auth::routes();
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});
Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});
Route::get('/', 'homeController@home')->name('home');
Route::get('/index', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index','show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);

//いいね機能
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});

Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

//ユーザーページ表示
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show')->middleware('auth');
    //プロフィール編集画面
    Route::get('/{name}/edit', 'UserController@edit')->name('edit')->middleware('auth');
    //プロフィール編集処理
    Route::patch('/{name}/update', 'UserController@update')->name('update')->middleware('auth');
    //パスワード編集画面
    Route::get('/{name}/password/edit', 'UserController@editPassword')->name('password.edit')->middleware('auth');
    //パスワード編集処理
    Route::patch('/{name}/password/update', 'UserController@updatePassword')->name('password.update')->middleware('auth');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
    });
});

# ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');
