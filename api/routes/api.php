<?php

use App\Http\Controllers\Normal\RecordController;
use Illuminate\Support\Facades\Route;

Route::prefix('/records')->group(function () {
    Route::post('/', [RecordController::class, 'registerRecord']);
});
