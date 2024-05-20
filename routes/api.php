<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

Route::post('/login', [ApiController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/shortlinks', [ApiController::class, 'getShortlinks']);
    Route::post('/shortlinks', [ApiController::class, 'createShortlink']);
    Route::get('/shortlinks/{shortlink}', [ApiController::class, 'getShortlink']);
    Route::put('/shortlinks/{shortlink}', [ApiController::class, 'updateShortlink']);
    Route::delete('/shortlinks/{shortlink}', [ApiController::class, 'deleteShortlink']);
    Route::get('/shortlinks/{shortlink}/clicks', [ApiController::class, 'getShortlinkClicks']);
});
