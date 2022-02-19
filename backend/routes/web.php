<?php

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

//TODO一覧画面を表示
Route::get('/', 'App\Http\Controllers\TodolistController@showList')->name('todolists');

//TODO登録画面を表示
Route::get('/blog/create', 'App\Http\Controllers\TodolistController@showCreate')->name('create');

//TODO登録
Route::post('/blog/store', 'App\Http\Controllers\TodolistController@exeStore')->name('store');

//Todolist詳細画面を表示
Route::get('/todolist/{id}', 'App\Http\Controllers\TodolistController@showDetail')->name('show');

//Todolist編集画面を表示
Route::get('/todolist/edit/{id}', 'App\Http\Controllers\TodolistController@showEdit')->name('edit');
Route::post('/todolist/update', 'App\Http\Controllers\TodolistController@exeUpdate')->name('update');

//Todo削除
Route::post('/todolist/delete/{id}', 'App\Http\Controllers\TodolistController@exeDelete')->name('delete');
