<?php

use App\Http\Controllers\Admin\RankController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RecordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

if (config('app.env') === 'production') {
    URL::forceScheme('https');
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/earthAdmin')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/login', [UserController::class, 'showLoginForm']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/signIn', [UserController::class, 'showSignInForm']);
    Route::post('/signIn', [UserController::class, 'signIn']);
    Route::post('/logout', [UserController::class, 'logout']);

    Route::prefix('/ranks')->group(function () {
        Route::get('/{gameMode}', [RankController::class, 'rankList']);
    });

    Route::prefix('/records')->group(function () {
        Route::delete('/{recordId}', [RecordController::class, 'deleteRecord']);
    });
});
