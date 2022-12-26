<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Packages\Exception\Rank\FailRegisterRankException;
use Throwable;

class Handler extends ExceptionHandler {
    protected $dontReport = [

    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $e) {
        if ($e instanceof ValidationException) {
            return response($e->errors(), 400);
        }

        if (config('app.debug')) {
            return parent::render($request, $e);
        }

        logs()->error($e);
        return response()->json(['message' => '不明なエラーが発生しました。'], 500);
    }

    public function register(): void {
        $this->reportable(function (FailRegisterRankException $e) {
            return response()->json(['message' => 'ランキングへの登録に失敗しました。'], 500);
        });
    }
}
