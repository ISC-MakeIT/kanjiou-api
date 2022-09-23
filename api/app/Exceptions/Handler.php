<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Packages\Domain\Exceptions\InvariantException;
use Packages\Domain\Exceptions\TimeLimit\OutOfRankingException;
use Throwable;

class Handler extends ExceptionHandler
{
	/**
	 * A list of the exception types that are not reported.
	 *
	 * @var array<int, class-string<Throwable>>
	 */
	protected $dontReport = [

	];

	/**
	 * A list of the inputs that are never flashed for validation exceptions.
	 *
	 * @var array<int, string>
	 */
	protected $dontFlash = [
		'current_password',
		'password',
		'password_confirmation',
	];

    public function render($request, Throwable $e)
    {
        if ($e instanceof InvariantException) {
            return response($e->getMessage(), 400);
        }
        if ($e instanceof OutOfRankingException) {
            return response('ランキング外です。', 400);
        }
        if ($e instanceof ValidationException) {
            return response($e->errors(), 400);
        }
        if (config('app.debug')) {
            parent::render($request, $e);
            return;
        }
        logs()->error($e);
        return response('不明なエラーが発生しました。', 500);
    }

	/**
	 * Register the exception handling callbacks for the application.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->reportable(function (Throwable $e) {

		});
	}
}
