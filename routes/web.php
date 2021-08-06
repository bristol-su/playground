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

Route::middleware('portal-auth')->group(function() {
    Route::get('/', [\BristolSU\Playground\Http\Controllers\HomeController::class, 'index']);
    Route::get('/control', [\BristolSU\Playground\Http\Controllers\ControlController::class, 'index'])->name('control');
});
