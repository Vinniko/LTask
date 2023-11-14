<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\BasicAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'user'], function (){
    Route::get('/all', [UserController::class, 'index'])
        ->middleware(BasicAuth::class)
    ;
});

Route::group(['prefix' => 'task'], function (){
    Route::get('/statuses', [TaskController::class, 'statuses'])
        ->middleware(BasicAuth::class)
    ;
    Route::get('/all', [TaskController::class, 'index'])
        ->middleware(BasicAuth::class)
    ;
    Route::get('/{task:id}', [TaskController::class, 'get'])
        ->middleware(BasicAuth::class)
    ;
    Route::post('/store', [TaskController::class, 'store'])
        ->middleware(BasicAuth::class)
    ;
    Route::put('/update/{task:id}', [TaskController::class, 'update'])
        ->middleware(BasicAuth::class)
    ;
    Route::delete('/delete/{task:id}', [TaskController::class, 'delete'])
        ->middleware(BasicAuth::class)
    ;
});

