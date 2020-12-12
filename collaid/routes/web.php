<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

//Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/login")
        ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});
Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
Route::get('/edit/user/', 'UserController@edit')->name('user.edit');
Route::post('/edit/user/', 'UserController@update')->name('user.update');

Route::get('/edit/password/user/', 'UserController@passwordEdit')->name('password.edit');
Route::post('/edit/password/user/', 'UserController@passwordUpdate')->name('password.update');
//Route::post('/edit/password/user/', 'UserController@passwordReset')->name('password.reset');

Route::get('/posts/{post}/delete', 'PostController@delete')->name('post.delete');

Route::group(['middleware' => ['XSS']], function () {
    Route::get('posts/create', 'PostController@create')->name('posts.create');
    Route::post('posts', 'PostController@store')->name('posts.store');
    Route::resource('posts', 'PostController');
    Route::post('posts/{post} ', 'PostController@update')->name('posts.update');
});

Route::get('myposts', 'PostController@personal')->name('myposts.index');

Route::get('/edit/avatar/user/', 'UserController@editAvatar')->name('avatar.edit');
Route::post('/edit/avatar/user/', 'UserController@updateAvatar')->name('avatar.update');

Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');



