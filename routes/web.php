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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => false]);

Route::middleware(['auth:web', 'nonmodule'])->group(function() {
    Route::get('/', 'HomeController@index');
    Route::get('/control', 'ControlController@index')->name('control');
});
