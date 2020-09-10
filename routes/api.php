<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WSController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/ws_auth', [WSController::class, 'auth']);
// Route::post('/ws_hash', [WSController::class, 'hash']);
// Route::post('/ws_optimization', [WSController::class, 'optimization']);
Route::post('/ws_upload', [WSController::class, 'upload']);
// Route::post('/ws_url_video', [WSController::class, 'urlVideo']);
