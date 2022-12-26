<?php

use App\Http\Controllers\Normal\RankController;
use Illuminate\Support\Facades\Route;

Route::prefix('/ranks')->group(function () {
    Route::post('/', [RankController::class, 'registerRank']);
});
