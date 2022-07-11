<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeLimit\CreateTimeLimitRequst;
use App\Http\Requests\TimeLimit\DeleteTimeLimitRequest;
use App\Http\Requests\TimeLimit\TimeLimitRequest;
use Packages\Service\TimeLimit\FindTimeLimitService;
use Packages\Service\TimeLimit\RegisterTimeLimitService;

class TimeLimitController extends Controller
{
    private FindTimeLimitService $findTimeLimitService;
    private RegisterTimeLimitService $registerTimeLimitService;

    public function __construct(
        FindTimeLimitService $findTimeLimitService,
        RegisterTimeLimitService $registerTimeLimitService,
    )
    {
        $this->findTimeLimitService = $findTimeLimitService;
        $this->registerTimeLimitService = $registerTimeLimitService;
    }

	public function timeLimits(): array
	{
        return $this->findTimeLimitService->timeLimits();
	}

	public function timeLimit(TimeLimitRequest $request): array
	{
        return $this->findTimeLimitService->timeLimit($request->ofDomain());
	}

	public function createTimeLimit(CreateTimeLimitRequst $request): void
	{
        $this->registerTimeLimitService->createTimeLimit($request->ofDomain());
	}

	public function deleteTimeLimit(DeleteTimeLimitRequest $request): void
	{
        $this->registerTimeLimitService->deleteTimeLimit($request->ofDomain());
	}
}
