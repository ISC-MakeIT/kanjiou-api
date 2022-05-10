<?php

use App\Http\Controllers\TimeLimitController;
use Illuminate\Support\Facades\Route;

Route::prefix('/time_limits')->group(function () {
	Route::get('/time_limit', [TimeLimitController::class, 'find_one']);
	Route::get('/', [TimeLimitController::class, 'find_all']);
	Route::post('/', [TimeLimitController::class, 'time_limit_create']);
});
