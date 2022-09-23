<?php

namespace Tests\Feature\TimeLimit;

use Packages\Infrastructure\Repositories\TimeLimit\ActiveTimeLimitRepository;
use Packages\Infrastructure\Repositories\TimeLimit\DeleteTimeLimitRepository;
use Packages\Infrastructure\Repositories\TimeLimit\InitTimeLimitRepository;
use Packages\Service\TimeLimit\CommandTimeLimitService;
use Packages\Service\TimeLimit\QueryTimeLimitService;
use Tests\DBRefreshTestCase;

class TimeLimitTestCase extends DBRefreshTestCase
{
    protected CommandTimeLimitService $commandTimeLimitService;
    protected QueryTimeLimitService $queryTimeLimitService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->commandTimeLimitService = new CommandTimeLimitService(
            new ActiveTimeLimitRepository()
        );
        $this->queryTimeLimitService = new QueryTimeLimitService(
            new InitTimeLimitRepository(),
            new DeleteTimeLimitRepository()
        );
    }
}
