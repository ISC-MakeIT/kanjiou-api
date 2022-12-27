<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Packages\Exception\Record\FailDeleteRecordException;
use Packages\Exception\Record\FailRegisterRecordException;
use Packages\Exception\User\FailRegisterUserException;
use Packages\Exception\User\FailUserToLoginException;
use Packages\Exception\User\IllegalExistsUserInDatabaseException;
use Throwable;

class Handler extends ExceptionHandler {
    public function render($request, Throwable $e) {
        if ($e instanceof ValidationException) {
            return response($e->errors(), 400);
        }
        if ($e instanceof FailRegisterRecordException) {
            return response()->json(['message' => 'ランキングへの登録に失敗しました。'], 500);
        }
        if ($e instanceof FailRegisterUserException) {
            return back()->withInput()->withErrors(['exception' => 'ユーザーの登録に失敗しました。']);
        }
        if ($e instanceof FailDeleteRecordException) {
            return back()->withInput()->withErrors(['exception' => 'レコードの削除に失敗しました。']);
        }
        if ($e instanceof IllegalExistsUserInDatabaseException) {
            return back()->withInput()->withErrors(['exception' => 'ユーザーが既に登録されています。']);
        }
        if ($e instanceof FailUserToLoginException) {
            return back()->withInput()->withErrors(['exception' => 'ユーザー名もしくはパスワードが違います。']);
        }

        if (config('app.debug')) {
            return parent::render($request, $e);
        }

        logs()->error($e);
        return response()->json(['message' => '不明なエラーが発生しました。'], 500);
    }
}
