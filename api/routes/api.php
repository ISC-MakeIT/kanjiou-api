<?php

use App\Http\Controllers\Normal\RankController;
use App\Http\Controllers\Normal\RecordController;
use Illuminate\Support\Facades\Route;

Route::prefix('/records')->group(function () {
    Route::post('/', [RecordController::class, 'registerRecord']);
});

Route::prefix('/ranks')->group(function () {
    Route::get('/', [RankController::class, 'rankList']);
    Route::get('/{secondsLeft}', [RankController::class, 'isRankedIn']);
});
