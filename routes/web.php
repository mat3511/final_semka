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
//Route::get('/students', [\App\Http\Controllers\StudentController::class, 'index']);
//Route::post('/add-students', [\App\Http\Controllers\StudentController::class, 'add'])->name('student.add');
//Route::get('students/{id}', [\App\Http\Controllers\StudentController::class, 'getStudentById']);
//Route::put('student/', [\App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
//Route::delete('students/{id}', [\App\Http\Controllers\StudentController::class, 'deleteStudent']);
//Route::get('/galery', function () {
//    return view('galery.index');
//})->name('galery.index');
//Route::view('add', 'article.create');
//Route::news('add', [ArticleController::class, 'addData']);
//Route::get('delete/{id}', [ArticleController::class, 'deleteData']);
//Route::get('edit/{id}', [ArticleController::class, 'updateData']);
//Route::resource('article', ArticleController::class);
//Route::get('/add', 'App\Http\Controllers\ArticleController@create')->name('article.create');
//Route::post('/add1', 'App\Http\Controllers\ArticleController@store')->name('article.store');

Route::get('/home', 'App\Http\Controllers\ArticleController@index')->name('home');
Route::get('/', 'App\Http\Controllers\ArticleController@index')->name('/');

Route::group(['middleware' => ['auth']], function (){
    Route::resource('user', UserController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
});

Route::group(['middleware' => ['auth']], function (){
    Route::resource('article', ArticleController::class);
    Route::get('article/{article}/delete', [ArticleController::class, 'destroy'])->name('article.delete');
});

Route::get('/galery', 'App\Http\Controllers\GaleryController@index')->name('/galery');

Route::group(['middleware' => ['auth']], function (){
    Route::resource('news', \App\Http\Controllers\NewsController::class);
    Route::get('news/{news}/delete', [\App\Http\Controllers\NewsController::class, 'destroy'])->name('news.delete');
});

Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('news.index');

Route::get('/fans', [\App\Http\Controllers\FanController::class, 'index'])->name('fans');
Route::post('/add-fans', [\App\Http\Controllers\FanController::class, 'add'])->name('fan.add');
Route::delete('fans/{id}', [\App\Http\Controllers\FanController::class, 'delete']);
