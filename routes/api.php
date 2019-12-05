<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->namespace('Api')->group(function() {
    Route::resource('module', 'ModuleController')->only(['index', 'show']);
    Route::prefix('/module/{module}/')->group(function() {
        Route::resource('module-instance', 'ModuleModuleInstanceController')->only(['store', 'index', 'destroy']);
    });

    Route::prefix('module-instance/{module_instance_override}')->group(function() {
        Route::resource('permission', 'ModuleInstancePermissionController')->only(['index', 'store', 'update'])->parameter('permission', 'module_permission_override');
        Route::resource('setting', 'ModuleInstanceSettingController')->only(['index', 'store', 'update'])->parameter('setting', 'module_instance_setting');
        Route::resource('service', 'ModuleInstanceServiceController')->only(['index', 'store', 'update', 'destroy'])->parameter('service', 'module_instance_service');
    });

    Route::prefix('service/{service}')->group(function() {
        Route::apiResource('connector', 'ServiceConnectorController')->only('index');
        Route::get('connection', 'ServiceConnectionController@index');
    });
    Route::apiResource('connection', 'ConnectionController')->only('store');
    Route::get('connection/{connection_id}/test', 'ConnectionController@test');

});
