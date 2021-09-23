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

Route::middleware('portal-guest')->get('/', [\BristolSU\Playground\Http\Controllers\LandingController::class, 'index'])->name('playground');

Route::middleware('portal-auth')->group(function() {
    Route::get('/home', [\BristolSU\Playground\Http\Controllers\HomeController::class, 'index'])->name('playground');
    Route::get('/control', [\BristolSU\Playground\Http\Controllers\ControlController::class, 'index'])->name('control');
});
