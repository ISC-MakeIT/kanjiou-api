<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeLimit\CreateTimeLimitRequst;
use App\Http\Requests\TimeLimit\DeleteTimeLimitRequest;
use App\Http\Requests\TimeLimit\TimeLimitRequest;
use Packages\Service\TimeLimit\CommandTimeLimitService;
use Packages\Service\TimeLimit\QueryTimeLimitService;

class TimeLimitController extends Controller
{
    private CommandTimeLimitService $commandTimeLimitService;
    private QueryTimeLimitService $queryTimeLimitService;

    public function __construct(
        CommandTimeLimitService $commandTimeLimitService,
        QueryTimeLimitService $queryTimeLimitService,
    )
    {
        $this->commandTimeLimitService = $commandTimeLimitService;
        $this->queryTimeLimitService = $queryTimeLimitService;
    }

	public function timeLimits(): array
	{
        return $this->commandTimeLimitService->timeLimits();
	}

	public function timeLimit(TimeLimitRequest $request): array
	{
        return $this->commandTimeLimitService->timeLimit($request->ofDomain());
	}

	public function createTimeLimit(CreateTimeLimitRequst $request): void
	{
        $this->queryTimeLimitService->createTimeLimit($request->ofDomain());
	}

	public function deleteTimeLimit(DeleteTimeLimitRequest $request): void
	{
        $this->queryTimeLimitService->deleteTimeLimit($request->ofDomain());
	}
}
