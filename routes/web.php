<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('article.index');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('/add', 'App\Http\Controllers\ArticleController@create')->name('article.create');
//Route::post('/add1', 'App\Http\Controllers\ArticleController@store')->name('article.store');
Route::get('/home', 'App\Http\Controllers\ArticleController@index')->name('home');
Route::get('/', 'App\Http\Controllers\ArticleController@index')->name('/');
//Route::resource('article', ArticleController::class);

//Route::view('add', 'article.create');
//Route::post('add', [ArticleController::class, 'addData']);
//Route::get('delete/{id}', [ArticleController::class, 'deleteData']);
//Route::get('edit/{id}', [ArticleController::class, 'updateData']);

Route::group(['middleware' => ['auth']], function (){
    Route::resource('user', UserController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
});

Route::group(['middleware' => ['auth']], function (){
    Route::resource('article', ArticleController::class);
    Route::get('article/{article}/delete', [ArticleController::class, 'destroy'])->name('article.delete');
});
