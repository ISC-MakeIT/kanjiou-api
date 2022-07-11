<?php

namespace Tests\Feature\TimeLimit;

use Packages\Assembler\TimeLimitAssember;
use Packages\Service\TimeLimit\FindTimeLimitService;
use Packages\Service\TimeLimit\RegisterTimeLimitService;
use Packages\Infrastructure\Repositories\TimeLimit\TimeLimitRepository;
use Tests\DBRefreshTestCase;

class TimeLimitTestCase extends DBRefreshTestCase
{
    protected FindTimeLimitService $findTimeLimitService;
    protected RegisterTimeLimitService $registerTimeLimitService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->findTimeLimitService = new FindTimeLimitService(
            new TimeLimitAssember(),
            new TimeLimitRepository()
        );
        $this->registerTimeLimitService = new RegisterTimeLimitService(
            new TimeLimitAssember(),
            new TimeLimitRepository()
        );
    }
}
