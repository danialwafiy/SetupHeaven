<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/login','SetupController@index');
Route::get('/','SetupController@index')->name('setup.index');
Route::get('/{user}/setup/{setup:slug}','SetupController@show')->name('setup.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('setup','SetupController')->except(['show','index']);
});

