<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api as Api;
use App\Http\Controllers\Auth as Auth;

/** Auth */
Route::post('register', [Auth\RegisterController::class, 'store']);
Route::apiResource('login', Auth\LoginController::class);

/** Common  */
Route::get('tasks/filters', [Api\Common\TaskController::class, 'index']);

/** User Tasks */
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'user/tasks'], function () {
    Route::get('/', [Api\User\TaskController::class, 'list']);
    Route::post('/', [Api\User\TaskController::class, 'add']);
    Route::put('/{task}', [Api\User\TaskController::class, 'edit']);
    Route::delete('/{task}', [Api\User\TaskController::class, 'delete']);
    Route::put('/complete/{task}', [Api\User\TaskController::class, 'complete']);
});

