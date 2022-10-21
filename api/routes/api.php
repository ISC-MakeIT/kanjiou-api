<?php

use App\Http\Controllers\TimeLimitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/time_limits')->group(function () {
	Route::get('/time_limit', [TimeLimitController::class, 'timeLimit']);
	Route::get('/', [TimeLimitController::class, 'timeLimits']);
	Route::post('/', [TimeLimitController::class, 'createTimeLimit']);
	Route::delete('/', [TimeLimitController::class, 'deleteTimeLimit']);
});

Route::prefix('/users')->group(function() {
    Route::post('/', [UserController::class, 'createUser']);
});
