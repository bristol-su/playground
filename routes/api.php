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

Route::middleware('portal-auth')->group(function() {
    Route::apiResource('module', \BristolSU\Playground\Http\Controllers\Api\ModuleController::class)->only(['index', 'show']);
    Route::prefix('/module/{module}/')->group(function() {
        Route::apiResource('event', \BristolSU\Playground\Http\Controllers\Api\ModuleEventController::class)->only(['index']);
        Route::apiResource('module-instance', \BristolSU\Playground\Http\Controllers\Api\ModuleModuleInstanceController::class)->only(['store', 'index', 'destroy']);
    });

    Route::prefix('module-instance/{module_instance_override}')->group(function() {
        Route::apiResource('permission', \BristolSU\Playground\Http\Controllers\Api\ModuleInstancePermissionController::class)->only(['index', 'store', 'update'])->parameter('permission', 'module_permission_override');
        Route::apiResource('setting', \BristolSU\Playground\Http\Controllers\Api\ModuleInstanceSettingController::class)->only(['index', 'store', 'update'])->parameter('setting', 'module_instance_setting');
        Route::apiResource('service', \BristolSU\Playground\Http\Controllers\Api\ModuleInstanceServiceController::class)->only(['index', 'store', 'update', 'destroy'])->parameter('service', 'module_instance_service');
        Route::post('completion-condition', [\BristolSU\Playground\Http\Controllers\Api\ModuleInstanceCompletionConditionController::class, 'store']);
        Route::get('completion-condition/test', [\BristolSU\Playground\Http\Controllers\Api\ModuleInstanceCompletionConditionController::class, 'test']);
        Route::apiResource('event', \BristolSU\Playground\Http\Controllers\Api\ModuleInstanceEventController::class)->only(['index']);
    });

    Route::prefix('service/{service}')->group(function() {
        Route::apiResource('connector', \BristolSU\Playground\Http\Controllers\Api\ServiceConnectorController::class)->only('index');
        Route::get('connection', [\BristolSU\Playground\Http\Controllers\Api\ServiceConnectionController::class, 'index']);
    });

    Route::apiResource('connection', \BristolSU\Playground\Http\Controllers\Api\ConnectionController::class)->only('store');
    Route::get('connection/{connection_id}/test', [\BristolSU\Playground\Http\Controllers\Api\ConnectionController::class, 'test']);

});
